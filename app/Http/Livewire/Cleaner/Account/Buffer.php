<?php

namespace App\Http\Livewire\Cleaner\Account;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Buffer extends Component
{
    use LivewireAlert;
    public $user;
    public $buffer;

    public function mount()
    {
        $this->user = auth()->user();

        $this->buffer = $this->user->UserDetails->buffer ?? '30';

    }

    public function action($action)
    {
        if($action=='plus'){
            $this->buffer = $this->buffer + 1;
        }
        else {
            if($this->buffer=='1'){
                $this->buffer = 1;
            }
            else {
                $this->buffer = $this->buffer - 1;
            }
        }
    }

    public function store()
    {
        $this->validate([
            'buffer' => 'required',
        ]);

        $details = $this->user->UserDetails;

        $details->buffer = $this->buffer;
        $details->save();

        $this->alert('success', 'Buffer saved');

    }

    public function render()
    {
        return view('livewire.cleaner.account.buffer');
    }
}
