<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;

class RatedCleaners extends Component
{

    public $cleaners;

    public function mount()
    {
        $this->cleaners = User::has('cleanerReviews')->where('role','cleaner')->latest()->get();

        $this->cleaners = $this->cleaners->filter( function($cleaner) {

            if ( $cleaner->avgRating() > 3 ){
                return true;
            }
        });
    }

    public function render()
    {
        return view('livewire.home.rated-cleaners');
    }
}
