<?php

namespace App\Http\Livewire\Admin\Cleaner;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;

class Cleaner extends Component
{
    public $cleanerStatus;

    public function changeStatus($id)
    {
        $cleanerStatus = User::find($id);
        if ($cleanerStatus->status == '1') {
            $cleanerStatus->status = '0';
            $cleanerStatus->save();
        } else {
            $cleanerStatus->status = '1';
            $cleanerStatus->save();
        }

        $this->user = User::find($id);
    }

    public function render()
    {
    
    $users = User::where('role', '=', 'cleaner')->get();

      
        return view('livewire.admin.cleaner.cleaner', compact('users'));
    }
}