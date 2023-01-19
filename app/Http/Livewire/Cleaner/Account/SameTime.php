<?php

namespace App\Http\Livewire\Cleaner\Account;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SameTime extends Component
{
    use LivewireAlert;
    public $user;
    public $jobs;

    protected $rules = [
        'jobs' => 'numeric|min:1'
    ];

    public function mount()
    {
        $this->user = auth()->user();

        $this->jobs = $this->user->UserDetails->jobs ?? '1';

    }

    public function action($action)
    {
        $this->validate();

        if($action=='plus'){
            $this->jobs = $this->jobs + 1;
        }
        else {
            if($this->jobs=='1'){
                $this->jobs = 1;
            }
            else {
                $this->jobs = $this->jobs - 1;
            }
        }
    }

    public function store()
    {
        $this->validate([
            'jobs' => 'required',
        ]);

        $details = $this->user->UserDetails;

        $details->jobs = $this->jobs;
        $details->save();

        $this->alert('success', 'Jobs saved');

    }


    public function render()
    {
        return view('livewire.cleaner.account.same-time');
    }
}
