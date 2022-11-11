<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;

class SearchResult extends Component
{

    public function render()
    {
        $cleaners = User::where('role','cleaner')->get();
        
        return view('livewire.home.search-result', ['cleaners'=> $cleaners]);
    }
}
