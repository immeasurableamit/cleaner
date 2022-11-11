<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;


class Customer extends Component
{    


    public function render()
    {
        $users = User::where('role', '=', 'customer')->get();
    
        return view('livewire.admin.customer', compact('users'));
    }
}
