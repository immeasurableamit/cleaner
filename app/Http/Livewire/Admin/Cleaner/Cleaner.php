<?php

namespace App\Http\Livewire\Admin\Cleaner;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use DB;

class Cleaner extends Component
{
    public function render()
    {
    
    $users = User::with(['UserDetails','cleanerTeam','UserDetails.State'])->where('role', '=', 'cleaner')->get();
      
        return view('livewire.admin.cleaner.cleaner', compact('users'));
    }
}