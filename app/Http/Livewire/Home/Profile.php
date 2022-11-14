<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $cleanerId;
    public function render()
    {
        $cleanerId = \Route::current()->parameters('id');
       
        $cleaners = User::find($cleanerId);

        return view('livewire.home.profile', ['cleaners' => $cleaners]);
    }
}
