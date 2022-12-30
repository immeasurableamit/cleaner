<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;

class RatedCleaners extends Component
{
    public function render()
    {
        $cleaners = User::with('cleanerReviews')->where('role','cleaner')->latest()->get();

        return view('livewire.home.rated-cleaners',['cleaners'=> $cleaners]);
    }
}
