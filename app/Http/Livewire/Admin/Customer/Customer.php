<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\State;

class Customer extends Component
{
    public function render()
    {
         $users = User::where('role', '=', 'customer')->get();
         
         return view('livewire.admin.customer.customer', compact('users'));
    }
}