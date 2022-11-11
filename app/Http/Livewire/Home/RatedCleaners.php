<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;

class RatedCleaners extends Component
{
    

    public function render()
    {
        $cleaners = User::where('role','cleaner')->get();
        // dd($cleaners);
        return view('livewire.home.rated-cleaners',['cleaners'=> $cleaners]);
    }
}
