<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;
use App\Models\Services;
use App\Models\ServicesItems;

class SearchResult extends Component
{
    public $services = [];
    public $itemAddOns = [];


    public $items = [];
    public $addons;
    public $serviceItems;


    public function mount()
    {
        $this->services = Services::with('servicesItems')->whereTypesId('1')->whereStatus('1')->get();

        $this->itemAddOns = ServicesItems::whereStatus('1')
            ->whereHas('service', function ($query) {
                $query->where('types_id', '2');
            })
            ->get();
    }


    public function search()
    {
        return User::where('role', 'cleaner')
            ->whereHas('cleanerServices', function ($query) {
                if ($this->items) {
                    $query->whereIn('services_items_id', $this->items);
                }
                if ($this->addons) {
                    $query->orWhere('services_items_id', $this->addons);
                }
            })
            ->get();
    }


    public function render()
    {
        //dd(($this->item));
        $cleaners = $this->search();

        return view('livewire.home.search-result', ['cleaners' => $cleaners]);
    }
}
