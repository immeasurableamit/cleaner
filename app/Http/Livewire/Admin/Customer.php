<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use DB;

class Customer extends Component
{    


    public function render()
    {
        $users = User::with('UserDetails.State')->where('role', '=', 'customer')->get();
    
        return view('livewire.admin.customer', compact('users'));
    }
}
