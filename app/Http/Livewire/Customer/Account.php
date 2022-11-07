<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use Livewire\Component;

class Account extends Component
{
    public $first_name, $contact_number;
    public $fieldStatus = false, $action;

    public function edit($userId, $action)
    {
       
        $user = User::find($userId);
        // dd($user);
        if ($action == 'contact_number') {
            $this->contact_number = $user->contact_number;
        }
    }
    public function update($action)
    {
        if ($this->userId) {
            $user = User::find($this->userId);

            if ($action == 'contact_number') {
                $user->contact_number = $this->contact_number;
            }
        }
    }

    public function render()
    {
        $user = User::findOrFail(auth()->user()->id);

        return view('livewire.customer.account', ['user' => $user]);
    }
}
