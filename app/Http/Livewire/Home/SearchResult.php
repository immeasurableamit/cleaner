<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;
use App\Models\Services;
use App\Models\ServicesItems;
use App\Models\CleanerHours;
use App\Models\CleanerServices;

class SearchResult extends Component
{

    /* parameters passed to this component while defining */
    public $selectedServiceItem, $address, $homeSize, $latitude, $longitude, $selectedServiceItemId;

    /* required props */
    public $services, $addons, $selectedAddonItemId, $eligibleCleaners, $filteredCleaners, $servicesItems;

    public $user; // logged in user

    /* Additonal filter props */
    public $minPrice, $maxPrice, $selectedAddonsIds = [], $dateStart, $dateEnd;



    public function mount()
    {
        $allServices    = Services::with('servicesItems')->whereStatus('1')->get();
        $this->services = $allServices->where('types_id', 1 );
        $this->addons   = $allServices->where('types_id', 2 );
        $this->user     = auth()->user();
        $this->servicesItems = ServicesItems::all();

        $this->preapreEligibleCleaners();
        //$this->addSelectedServicePropInEligibleCleaners();
        $this->filterCleaners();
    }

    public function addSelectedServicePropInEligibleCleaners()
    {
        $this->eligibleCleaners = $this->eligibleCleaners->each ( function ( $cleaner ) {
            $cleanerService = $cleaner->cleanerServices->where('services_items_id', $this->selectedServiceItem->id )->first();

            if ( ! $cleanerService ) {
                $selectedServiceDetails = [
                    'title' => 'Jsn',
                    'price' => '111',
                    'duration' => '111',
                ];
            } else {
                $selectedServiceDetails = [
                    'title' => $this->selectedServiceItem->title,
                    'price' => $cleanerService->priceForSqFt( $this->homeSize ),
                    'duration' => $cleanerService->duration,
                ];
            }

            $this->selectedServiceDetails = $selectedServiceDetails;
        });
        return true;
    }

    /*
     * Eligble cleaners are those who have set
     * following things in their account:
     *
     * 1. Availability time
     * 2. Location they serve
     * 3. Services they offer
     *
     *
     */
    protected function preapreEligibleCleaners()
    {
        $cleaners  = User::where('role', 'cleaner')->with(['UserDetails', 'CleanerHours', 'CleanerServices'])->get(); // NOTE: can be optimized --jashan
        $eligibleCleaners = $cleaners->filter(function( $cleaner ) {

            if ( $cleaner->hasCleanerSetHisServedLocations() === false ) {
                return false;
            }

            if ( $cleaner->cleanerHours->isEmpty() ){
                return false;
            }

            if ( $cleaner->cleanerServices->where('status', '1')->isEmpty() ){
                return false;
            }

            return true;
        });

        $this->eligibleCleaners = $eligibleCleaners;
        return true;
    }

    /*
     * Filter cleaners according to customer needs.
     *
     */
    protected function filterCleaners()
    {
        $this->filteredCleaners = $this->eligibleCleaners->filter( function( $cleaner) {

            /* Service */
            $cleanerSelectedService = $cleaner->cleanerServices->where('status', '1')->where('services_items_id', $this->selectedServiceItemId )->first();
            if ( ! $cleanerSelectedService ){
                return false;
            }

            /* Min price */
            if ( $this->minPrice ){
                if ( $cleanerSelectedService->priceForSqFt($this->homeSize) < $this->minPrice ) {
                    return false;
                }
            }

            /* Max price */
            if ( $this->maxPrice ){
                if ( $cleanerSelectedService->priceForSqFt($this->homeSize) > $this->maxPrice ) {
                    return false;
                }
            }

            /* Addons offered */
            if ( $this->selectedAddonsIds ) {

                $cleanerSelectedAddons = $cleaner->cleanerServices->where('status', '1')->whereIn('services_items_id', $this->selectedAddonsIds );
                if ( $cleanerSelectedAddons->isEmpty() ){
                    return false;
                }
            }

            return true;
        });

    }

    function updated( $name, $value )
    {
        if ( $name == 'selectedServiceItemId' ) {
            $this->selectedServiceItem = $this->servicesItems->where('id', $value )->first();
        }

        if ( in_array( $name, [ 'minPrice', 'maxPrice', 'selectedAddonsIds', 'selectedServiceItemId']) ){
            $this->filterCleaners();
        }

        if ( $name == 'dateStart') {
            dd( $this->dateStart );
        }
    }

    public function render()
    {
        return view('livewire.home.search-result');
    }
}
