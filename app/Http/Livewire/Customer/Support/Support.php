<?php

namespace App\Http\Livewire\Customer\Support;

use Livewire\Component;
use App\Models\Order;
use App\Models\SupportRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Support extends Component
{

    use LivewireAlert;

    public $completedOrders, $user, $issues, $resolutions;

    public $selectedOrderId, $issue, $requestedResolution, $description, $otherIssueExplaination;

    public function mount()
    {
        $this->user = auth()->user();
        $this->completedOrders = Order::with([ 'user', 'items.service_item.service'])->where('user_id', $this->user->id )->get(); //whereIn('status', ['payment_collected', 'reviewed'])->get();
        $this->issues          = SupportRequest::issuesForUser();
        $this->resolutions     = SupportRequest::resolutionsForUser();

        $this->addCustomAttributesInCompletedOrdersProp();
    }

    public function hydrate()
    {
        $this->addCustomAttributesInCompletedOrdersProp();
        $this->resetErrorBag();
    }

    public function addCustomAttributesInCompletedOrdersProp()
    {

        $this->completedOrders->each( function($order) {

            $formattedDateTime = $order->cleaning_datetime->format('m/d/y');
            //$order->title = "$formattedDateTime - ".$order->service()->title." - ".$order->user->name;
            $order->title = "$formattedDateTime - ".$order->serviceOrderItem()->service_item->service->title." - ".$order->user->name;
        });
    }

    public function rules()
    {
        $rules = [
            'selectedOrderId' => "required|exists:orders,id",
            'issue'           => 'required|max:500',
            'requestedResolution'    => 'required|max:500',
            'otherIssueExplaination' => 'max:500|required_if:issue,other',
            'description'            => 'required'
        ];

        return $rules;
    }

    public function resetFormFields()
    {
        $this->reset([
            'selectedOrderId',
            'issue',
            'requestedResolution',
            'description',
            'otherIssueExplaination',
        ]);

        return true;
    }

    public function storeSupportRequest()
    {
        $this->validate( $this->rules() );

        $supportRequest = SupportRequest::create([
            'order_id'   => $this->selectedOrderId,
            'issue_type' => $this->issue,
            'issue'      => $this->issues[ $this->issue ],
            'requested_resolution_type'  => $this->requestedResolution,
            'requested_resolution'       => $this->resolutions[ $this->requestedResolution ],
            'description'                => $this->description,
            'explanation_for_other_type' => $this->otherIssueExplaination,
            'user_id'                     => $this->user->id,
        ]);


        $this->resetFormFields();

        // TODO: send email to admin
        $this->alert('success', 'Support request submitted');
        $this->dispatchBrowserEvent('cleaerSelectionsInSelectors');
        return true;
    }


    public function render()
    {
        return view('livewire.customer.support.support');
    }
}
