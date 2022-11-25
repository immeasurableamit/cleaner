<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $cleanerId;
    public $cleaner;


    public function mount()
    {
        $this->cleaner = User::findOrFail($this->cleanerId);
    }


    public function render()
    {
        return view('livewire.home.profile');
    }
}
