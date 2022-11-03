<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use DB;

class Cleaner extends Component
{
     public function render()
    {
        $users = User::with('UserDetails')->where('role', '=', 'cleaner')->get();
    
        return view('livewire.admin.cleaner', compact('users'));
    }
}
