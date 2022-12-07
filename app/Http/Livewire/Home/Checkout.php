<?php

namespace App\Http\Livewire\Home;

use App\Models\CleanerServices;
use App\Models\ServicesItems;
use App\Models\State;
use Livewire\Component;

use App\Models\User;
use Carbon\Carbon;

class Checkout extends Component
{
    public $currentlyActiveStep = 1;
    public $details;

    /* First step props */
    public $cleaner, $datetime, $estimatedDuration, $frequency;
    public $cleanerService, $addOns, $homeSize;

    /* Second step props */
    public $subtotal, $tax, $transactionFees, $total;

    /* Third step props */
    public $firstname, $lastname, $email, $password;
    public $confirmPassword, $address, $aptOrUnit;
    public $city, $state, $zip, $paymentMethod;

    public $states;

    public function next()
    {
        $this->currentlyActiveStep += 1;        
    }

    public function previous()
    {
        $this->currentlyActiveStep -= 1;
        $this->prepare();
    }

    public function prepareServiceAddOnsAndEstimatedDurationProps()
    {
        /* Fetch selected services from DB */
        $cleanerServicesIds = array_merge( [ $this->details['serviceItemId'] ], $this->details['addOnIds'] );
        $cleanerServices    = CleanerServices::with('servicesItems.service')->whereIn('services_items_id', $cleanerServicesIds )->get();

        /* Add attributes for blade */
        $cleanerServices->each( function($item, $key) {
            $item->rate               = $item->priceForSqFt( $this->details['homeSize'] );
            $item->service_item_title = $item->servicesItems->title;
            $item->service_title      = $item->servicesItems->service->title;

        });

        /* Set Props */
        $this->cleanerService    = $cleanerServices->where('services_items_id', $this->details['serviceItemId'] );
        $this->addOns            = $cleanerServices->whereIn('services_items_id', $this->details['addOnIds']);
        $this->estimatedDuration = $cleanerServices->sum('duration');
    }

    public function preparePricingProps()
    {
        $this->subtotal = $this->cleanerService->first()->rate + $this->addOns->sum('rate');
        $this->tax      = 0; // TODO: make this dynamic
        $this->transactionFees = ( $this->subtotal + $this->tax ) / 100 * 2; // TODO: transaction fees calculation formula needed. 2% for make it work
        $this->total    = $this->subtotal + $this->tax + $this->transactionFees;
    }

    public function prepare()
    {
        $this->cleaner      = User::find( $this->details['cleanerId'] );
        $this->datetime     = Carbon::createFromFormat('Y-m-d H:i:s', $this->details['selected_date']." ".$this->details['time'] )->toDayDateTimeString();
        $this->homeSize     = $this->details['homeSize'];
        $this->states       = State::all();
        
        $this->prepareServiceAddOnsAndEstimatedDurationProps();
        $this->preparePricingProps();
    }

    public function checkoutInfoRules()
    {
    }

    public function schedule()
    {
        
    }

    public function mount()
    {
        $this->prepare();
    }
    
    public function render()
    {
        $this->emit('componentRendered', $this->currentlyActiveStep );
        return view('livewire.home.checkout');
    }
}
