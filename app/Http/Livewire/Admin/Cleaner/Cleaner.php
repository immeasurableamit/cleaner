<?php

namespace App\Http\Livewire\Admin\Cleaner;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;

class Cleaner extends Component
{
    public function render()
    {
    
    $users = User::where('role', '=', 'cleaner')->get();

      
        return view('livewire.admin.cleaner.cleaner', compact('users'));
    }
}