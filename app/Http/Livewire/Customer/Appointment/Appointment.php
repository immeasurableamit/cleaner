<?php

namespace App\Http\Livewire\Customer\Appointment;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use \Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Appointment extends Component
{

    use LivewireAlert;

    public $selectedTab  = 1;
    public $selectedDate, $events, $selectedDateOrders;
    public $orders;
    protected $listeners = ['orderCancelledByCustomer'];
    protected $pendingOrderStatuses = ['pending', 'rejected', 'cancelled_by_customer'];


    public function mount()
    {
        $this->prepare();
    }


    public function prepareOrdersPro()
    {
        $orders = Order::with('items.service_item')->where('user_id', auth()->user()->id)->get();

        $this->orders = $orders;

        $this->dispatchBrowserEvent('prepareOrdersPro', ['orders' => $orders]);

        return  true;
    }


    protected function parseOrdersForCalendarEvents($orders)
    {

        $events = $orders->map(function ($order) {
            $cleaningDateTime = Carbon::parse($order->cleaning_datetime);

            $event = [
                'id'    => $order->id,
                'title' => $cleaningDateTime->format("h:i A"),
                'start' => $cleaningDateTime->toDateString(),
            ];
            return $event;
        })->values();

        return $events;
    }

    public function prepare()
    {
        $this->selectedDate = $this->selectedDate ?? today()->toDateString();

        $this->refreshSelectedTab();
    }


    public function renderCalendar()
    {
        $events = $this->parseOrdersForCalendarEvents($this->orders);
        $this->events = $events;

        $this->dispatchBrowserEvent('renderCalendar', ['events' => $events]);
        return true;
    }

    protected function refreshSelectedTab()
    {
        $this->prepareOrdersPro();
        $this->renderCalendar();
        $this->renderOrders();
    }

    //


    public function updated($propertyname)
    {

        if ($propertyname == "selectedDate") {
            $this->renderOrders();
        }
    }

    public function renderOrders()
    {
        $this->selectedDateOrders = $this->orders->filter(function($order) {
            return $order->cleaning_datetime->startOfDay()->equalTo( $this->selectedDate );
        });

        $this->dispatchBrowserEvent('renderOrders');
        return true;
    }

    /* Order cancelled by customer */

    public function cancelOrder($orderId)
    {

        $this->alert('warning', 'Are you sure do want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Delete it',
            'onConfirmed' => 'orderCancelledByCustomer',
            'timer' => null,
            'input' => 'text',
            'inputValue' => $orderId,
            'inputAttributes' => [
                'hidden' => true,
            ]
        ]);
    }

    public function orderCancelledByCustomer($data)
    {
        $orderId = $data['value'];
        $order   = Order::where('id', $orderId )->update(['status' => 'cancelled_by_customer']);
        $this->alert('success', 'Order cancelled');
        $this->refreshSelectedTab();
    }

    public function render()
    {
        return view('livewire.customer.appointment.appointment');
    }
}
