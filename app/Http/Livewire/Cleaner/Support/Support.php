<?php

namespace App\Http\Livewire\Cleaner\Support;

use Livewire\Component;
use App\Models\Order;
use App\Models\SupportRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Mail;
use App\Mail\SupportRequestMail;

class Support extends Component
{

    use LivewireAlert;

    public $completedOrders, $cleaner, $count = 1, $issues, $resolutions;

    public $selectedOrderId, $issue, $requestedResolution, $description, $otherIssueExplaination;

    public function mount()
    {
        $this->cleaner = auth()->user();
        $this->completedOrders = Order::with([ 'cleaner','user', 'items.service_item.service'])->where('cleaner_id', $this->cleaner->id )->get(); //whereIn('status', ['payment_collected', 'reviewed'])->get();
    //    dd( $this->completedOrders);

        $this->issues          = SupportRequest::issuesForCleaner();
        $this->resolutions     = SupportRequest::resolutionsForCleaner();

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
            $order->title = "$formattedDateTime - ".$order->service()->title." - ".$order->user->name;
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
            'user_id' => $this->cleaner->id,
        ]);

        $this->resetFormFields();

        Mail::to( env("ADMIN_EMAIL") )->queue( new SupportRequestMail( $supportRequest ));
        $this->alert('success', 'Support request submitted');
        $this->dispatchBrowserEvent('cleaerSelectionsInSelectors');
        return true;
    }

    public function render()
    {
        return view('livewire.cleaner.support.support');
    }
}
