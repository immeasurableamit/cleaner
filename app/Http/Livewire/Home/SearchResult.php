<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;
use App\Models\Services;
use App\Models\ServicesItems;
use App\Models\CleanerHours;
use App\Models\CleanerServices;
use \Carbon\Carbon;
use App\Models\Favourite;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class SearchResult extends Component
{

    use LivewireAlert;

    /* parameters passed to this component while defining */
    public $selectedServiceItem, $address, $homeSize, $latitude, $longitude, $selectedServiceItemId;

    /* required props */
    public $services, $addons, $selectedAddonItemId, $eligibleCleaners, $filteredCleaners, $servicesItems;

    public $user; // logged in user

    /* Additonal filter props */
    public $minPrice, $maxPrice, $selectedAddonsIds = [];
    public $dateStart, $dateEnd, $selectedWeekDays, $sortBy, $skipFiltering = false;
    public $organicOnly = false, $insuredOnly = false, $rating;



    public function mount()
    {
        $allServices    = Services::with('servicesItems')->whereStatus('1')->get();
        $this->services = $allServices->where('types_id', 1 );
        $this->addons   = $allServices->where('types_id', 2 );

        $this->servicesItems = ServicesItems::all();

        if ( auth()->user() ) {
            $this->user = User::with('favourites')->where('id', auth()->user()->id )->first();
        }

        $this->preapreEligibleCleaners();
        $this->filterCleaners();
    }



    /*
     * Eligble cleaners are those who have set
     * following things in their account:
     *
     * 1. Availability time
     * 2. Location they serve
     * 3. Services they offer
     * 4. Connected bank account with stripe
     *
     *
     */
    protected function preapreEligibleCleaners()
    {
        $cleaners  = User::has('bankInfo')->where('role', 'cleaner')->with(['UserDetails', 'CleanerHours', 'CleanerServices', 'cleanerReviews'])->get(); // NOTE: can be optimized --jashan
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

    protected function sortFilteredCleaners()
    {
        if ( $this->sortBy == "price_desc" ){
            $this->filteredCleaners = $this->filteredCleaners->sortByDesc('price_for_selected_service');
        } elseif ( $this->sortBy == "price_asc" ) {
            $this->filteredCleaners = $this->filteredCleaners->sortBy('price_for_selected_service');
        }
    }
    /*
     * Filter cleaners according to customer selected filters in page.
     *
     */
    protected function filterCleaners()
    {
        $this->filteredCleaners = $this->eligibleCleaners->filter( function( $cleaner) {

            /* Service */
            $cleanerSelectedService = $cleaner->cleanerServices->where('status', '1')
                                        ->where('services_items_id', $this->selectedServiceItemId )->first();
            if ( ! $cleanerSelectedService ){
                return false;
            }

            /* Location */
            if ( ! $cleaner->isWithinRadius($this->latitude, $this->longitude) ) {
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

            /* Availability */ // TODO: this filter should also check the max number of jobs
            if ( $this->selectedWeekDays ) {
                $cleanerWeekDays = $cleaner->cleanerHours->pluck('day')->unique()->map('strtolower')->toArray();
                $matchedDays     = array_intersect( $this->selectedWeekDays, $cleanerWeekDays );
                if ( ! $matchedDays ) {
                    return false;
                }
            }

            /* Organic cleaners only */
            if ( $this->organicOnly ) {
                $doesNotProvideOrganicService = $cleaner->UserDetails->provide_organic_service != 1;
                if ( $doesNotProvideOrganicService ) {
                    return false;
                }
            }

            /* Insured cleaners only */
            if ( $this->insuredOnly ) {
                $isNotInsured = $cleaner->UserDetails->is_insured != 1;
                if ( $isNotInsured ){
                    return false;
                }
            }

            /* Rating */
            if ( $this->rating ) {
                $avgRating =  $cleaner->cleanerReviews->avg('rating');
                if ( $avgRating < $this->rating   ) {
                    return false;
                }
            }

            $cleaner->price_for_selected_service    = $cleanerSelectedService->priceForSqFt( $this->homeSize );
            $cleaner->duration_for_selected_service = $cleanerSelectedService->duration;
            $cleaner->avg_rating                    = $cleaner->cleanerReviews->avg('rating');
            return true;
        });

        $this->sortFilteredCleaners();
        return true;
    }

    function updateWeekDays()
    {
        if ( ! $this->dateStart || ! $this->dateEnd ) {
            return [];
        }

        $period   = \Carbon\CarbonPeriod::create( $this->dateStart, $this->dateEnd );
        $weekdays = [];
        foreach ( $period as $periodDate ) {

            $weekday = $periodDate->englishDayOfWeek;
            array_push( $weekdays, $weekday );
        }

        $this->selectedWeekDays = array_unique( array_map('strtolower', $weekdays ) );
        return true;
    }

    protected function filterCleanersIfNeeded($updatedPropName)
    {
        if ( $this->skipFiltering ) {
            return false;
        }

        $filters = [
            'minPrice',
            'maxPrice',
            'selectedAddonsIds',
            'selectedServiceItemId',
            'dateStart',
            'dateEnd',
            'latitude',
            'longitude',
            'homeSize',
            'sortBy',
            'organicOnly',
            'insuredOnly',
            'rating'
        ];

        if ( in_array( $updatedPropName, $filters) ){
            $this->filterCleaners();
        }

        return true;
    }

    function updated( $name, $value )
    {
        if ( $name == 'selectedServiceItemId' ) {
            $this->selectedServiceItem = $this->servicesItems->where('id', $value )->first();
        }

        if ( $name == 'dateStart' ) {
            $this->dateStart = Carbon::parse( $this->dateStart )->toDateString();
            $this->updateWeekDays();
        }

        if ( $name == 'dateEnd' ) {
            $this->dateEnd = Carbon::parse( $this->dateEnd )->toDateString();
            $this->updateWeekDays();
        }

        if ( $name == "homeSize") {
            $this->validate(['homeSize' => 'numeric|min:100']);
            $this->homeSize = empty( $value ) ? null : $value;
        }

        $this->filterCleanersIfNeeded($name);
    }

    public function toggleFavouriteCleaner($cleanerId)
    {
        $favourite = Favourite::where('user_id', $this->user->id )->where('cleaner_id', $cleanerId )->first();
        if ( $favourite ) {
            $favourite->delete();
            $this->alert('success', 'Removed from favourites');
        } else {
            $favourite = Favourite::create([
                'user_id' => $this->user->id,
                'cleaner_id' => $cleanerId,
            ]);
            $this->alert('success', 'Added to favourites');
        }

        return true;
    }




    // public function storeInfoInFavourite()
    // {
    //     $cleanerService = new Favourite;
    //     $cleanerService->user_id = auth()->user()->id;
    //     $cleanerService->cleaner_id = $this->cleanerId;
    //     $cleanerService->home_size = $this->homeSize;
    //     $cleanerService->estimated_time = $this->estimatedTime;
    //     $cleanerService->price = $this->estimatedPrice;
    //     $cleanerService->cleaning_type = $this->title;

    //     dd( $cleanerService->cleaning_type);

    //     $cleanerService->save();

    // }

    public function render()
    {
        return view('livewire.home.search-result');
    }
}
