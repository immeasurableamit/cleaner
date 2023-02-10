<?php

namespace App\Http\Livewire\Cleaner;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Component;
use \Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
// use App\Http\Livewire\Cleaner\Notification\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Customer\OrderConfirmed as CustomerOrderConfirmed;
use App\Notifications\Cleaner\OrderConfirmed as CleanerOrderConfirmed;

use App\Notifications\Customer\OrderCancelled as OrderCancelledNotificationForCustomer;
use App\Notifications\Cleaner\OrderCancelled as OrderCancelledNotificationForCleaner;
use App\Notifications\Customer\OrderDeclined;


use Illuminate\Support\Facades\Notification;

class Jobs extends Component
{

    use LivewireAlert;
 //   use Notifiable;

    /*
     * @var: selectedTab
     * 1 means MyJobs tab
     * 2 means NewRequests tab
     */
    public $selectedTab  = 1;

    public $selectedDate, $orders, $selectedDateOrders, $events;
    public $email, $user, $order;

    protected $pendingOrderStatuses = ['pending'];

    protected $queryString = [
        'selectedDate' => [ 'except' => ''],
        'selectedTab'  => ['except' => 1]
    ];

    protected $listeners = [
        'cancelOrder'
    ];

    public function mount()
    {
        $this->prepare();
    }

    public function prepare()
    {
        $this->selectedDate = $this->selectedDate ?? today()->toDateString();
        $this->refreshSelectedTab();
    }

    protected function refreshSelectedTab()
    {
        $this->prepareOrdersProp();
        $this->renderCalendar();
        $this->renderOrders();
    }

    /*
     * This fetchs only needed data from database
     * that fasts the speed of page.
     *
     */
    protected function prepareOrdersProp()
    {
        $userRelation = ['user' => function ( $query ) {
            $query->without('UserDetails')->select('id','email', 'contact_number');
        }];

        $itemsRelation = ['items' => function ( $query ) {
            $query->select('id','order_id', 'service_item_id')->with('service_item:id,title');
        }];

        $relations = array_merge( $userRelation, $itemsRelation );

        $this->orders = Order::with($relations)->where('cleaner_id', auth()->user()->id )->get();

        $this->addAttributesInOrders();

    }

    protected function renderCalendar()
    {
        $orders = $this->getOrdersForSelectedTab();
        $events = $this->parseOrdersForCalendarEvents($orders);

        $this->events = $events;
        $this->dispatchBrowserEvent('renderCalendar', ['events' => $events]);
        return true;
    }

    protected function renderOrders()
    {
        $orders = $this->getOrdersForSelectedTab();

        $this->selectedDateOrders = $orders->filter(function($order) {
            return $order->cleaning_datetime->startOfDay()->equalTo( $this->selectedDate );
        })->sortByDesc('id');

        $this->dispatchBrowserEvent('renderOrders');
        return true;
    }


    protected function getPendingOrders()
    {
        return $this->orders->whereIn('status', $this->pendingOrderStatuses );

    }

    protected function getAcceptedOrders()
    {
        return $this->orders->whereNotIn('status', $this->pendingOrderStatuses );
    }

    protected function parseOrdersForCalendarEvents($orders)
    {

        $events = $orders->map( function($order) {
            $cleaningDateTime = Carbon::parse( $order->cleaning_datetime );
            $event = [
                'id'    => $order->id,
                'title' => $cleaningDateTime->format("h:i A"),
                'start' => $cleaningDateTime->toDateString(),
            ];
            return $event;
        })->values();

        return $events;
    }

    protected function getOrdersForSelectedTab()
    {
        if ( $this->selectedTab == 1 ) {
            $orders = $this->getAcceptedOrders();

        } else {
            $orders = $this->getPendingOrders();

        }

        return $orders;
    }


    protected function addAttributesInOrders()
    {
        $this->orders->each( function ($order) {
            $order->service_item_titles = $order->items->map(function ($item) {
                return $item->service_item->title;
            })->implode(', ');
        });
    }

    public function hydrate()
    {
        $this->addAttributesInOrders();
    }


    public function acceptOrder( $orderId )
    {
        $order = Order::find( $orderId );

        /* Change status and return because we don't charge customer on accepting now */
        $order->status = 'accepted';
        $order->save();


        $order->user->notify(new CustomerOrderConfirmed($order));
		//$order->cleaner->notify( new CleanerOrderConfirmed($order) );
        $this->alert('success', 'Order accepted');
        $this->refreshSelectedTab();
        return true;
    }

    public function rejectOrder( $orderId )
    {

        $order = Order::find($orderId);
        $order->status = 'rejected';
        $order->save();
        $order->user->notify( new OrderDeclined( $order ) );
        $this->alert('success', 'Booking rejected');
        $this->refreshSelectedTab();
    }


    protected function storeCollectPaymentTransaction($user_id, $order_id, $amount, $chargeResp)
    {
        $isChargeFailed = $chargeResp['status'] == false;
        $stripeErrorObj = null;

        if ( $isChargeFailed ){
            $stripeErrorObj = $chargeResp['error']->getError();
            $stripeId       = $stripeErrorObj->charge;
        } else {
            $stripeId = $chargeResp['charge_id'];
        }


        $transaction = new Transaction;
        $transaction->user_id   = $user_id;
        $transaction->amount    = $amount;
        $transaction->type      = 'debit';
        $transaction->action    = 'charge';
        $transaction->stripe_id = $stripeId;
        $transaction->transactionable_id   = $order_id;
        $transaction->transactionable_type = Order::class;

        if ( $isChargeFailed ) {
            $transaction->status         = 'failed';
            $transaction->failure_code   = $stripeErrorObj->code;
            $transaction->failure_reason = $stripeErrorObj->message;
        }

        $transaction->save();
	$transaction->refresh();

        return $transaction;
    }



    public function collectPayment($orderId)
    {
        $order = Order::find( $orderId );
        $user  = $order->user;

        /* Charge customer */
        $chargeResp = stripeChargeCustomer(
            $user->UserDetails->stripe_customer_id,
            $order->totalInCents(),
            "CanaryCleaner charge for order #$order->id"
        );

        /* Store transaction */
        $transaction = $this->storeCollectPaymentTransaction(
            $user->id,
            $order->id,
            $order->total,
            $chargeResp,
        );

        /* Update order */
        $isTransactionSuccess       = $transaction->status == 'success';
        $order->status              = $isTransactionSuccess ? 'payment_collected' : 'payment_failed';
        $order->is_paid_by_user     = $isTransactionSuccess ? 1 : 0;
        $order->user_transaction_id = $transaction->id;
        $order->save();

        /* Set alert */
        $alertMessage = $isTransactionSuccess ? 'Payment Collected' : 'Payment Failed';
        $alertType    = $isTransactionSuccess ? 'success' : 'error';
        $this->alert( $alertType, $alertMessage);
        $this->refreshSelectedTab();

        return $isTransactionSuccess;
    }

    public function updated($name)
    {

        if ( $name == "selectedTab" ) {
            $this->renderCalendar();
            $this->renderOrders();
        }

        if ( $name == "selectedDate") {
            $this->renderOrders();
        }
    }

    public function confirmCancelOrderAction( $orderId )
    {
        $this->alert('', 'Are you surely want to cancel the booking?', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'cancelOrder',
            'showCancelButton' => true,
            'onDismissed' => '',
            'confirmButtonText' => 'Yes',
            'cancelButtonText' => 'No',
            'width' => 500, // pixels
            'input' => 'text',
            'inputValue' => $orderId,
            'inputAttributes' => [
                'hidden' => true,
            ],
            'allowOutsideClick' => false,
            'timer' => null,
        ]);
    }

	protected function sendCancelOrderNotifications($order)
	{
		$order->user->notify( new OrderCancelledNotificationForCustomer( $order ) );
		$order->cleaner->notify( new OrderCancelledNotificationForCleaner( $order ) );
	}

    public function cancelOrder( $data )
    {
        $order = Order::find( $data['value'] );

        if ( $order->status != 'payment_collected' ) {
            $order->status = 'cancelled';
            $order->save();

			$this->sendCancelOrderNotifications($order);
            $this->alert('success','Booking cancelled');
            $this->refreshSelectedTab();
            return true;
        }

        /* Refund amount to customer */
        $refundResp = refundOrder( $order, "Canary Cleaner, cleaner cancelled the order #$order->id" );
        if ( $refundResp['status'] == false ) {
            $this->alert('error', 'Booking not cancelled');
            return false;
        }

        /* Store refund transaction details in DB */
        $transaction = storeRefundOrderTransaction(
            $order->user_id,
            $order->id,
            $order->total,
            $refundResp['refund_id']
        );

        /* Update order */
        $order->is_refunded = 1;
        $order->refund_transaction_id  = $transaction->id;
        $order->status = 'cancelled';
        $order->save();

		$this->sendCancelOrderNotifications($order);
        $order->user->notify( new OrderCancelledNotificationForCustomer( $order ) );
        $this->alert('success','Booking cancelled');
        $this->refreshSelectedTab();
        return true;
    }

    public function render()
    {
        return view('livewire.cleaner.jobs');
    }
}
