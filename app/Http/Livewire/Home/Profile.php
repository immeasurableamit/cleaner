<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{

    public function render()
    {
    //    $cleanerId = $this->id;
    //    dd($cleanerId);
        $cleaners = User::where('role','cleaner')->get();

        // $cleaners = User::where('id','$id')->first();
        // dd($cleaners);
        
        return view('livewire.home.profile',['cleaners'=> $cleaners]);
    }
}
