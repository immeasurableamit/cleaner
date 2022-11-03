<?php

namespace App\Http\Livewire\Cleaner;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;

class Account extends Component
{

    public $email, $timezone, $first_name, $last_name, $contact_number, $address, $about;
   
    public $fieldStatus = false, $action;

    public function editData($userId, $action)
    {
        $user = User::find($userId);
        $this->userId = $userId;
        if ($action == 'name') {
            $this->name = $user->name;
        }
        if ($action == 'contact_number') {
            $this->contact_number = $user->contact_number;
        }
        if ($action == 'email') {
            $this->email = $user->email;
        }

        if ($action == 'address') {
            $this->address = $user->UserDetails->address;
        }
        if ($action == 'about') {
            $this->about = $user->UserDetails->about;
        }

        $this->image = $user->image;

        $this->action = $action;

        $this->fieldStatus = true;
    }

    public function cancle()
    {
        $this->fieldStatus = false;
    }

    public function updateData($action)
    {

        if ($this->userId) {
            $user = User::find($this->userId);
            $userdetail = $user->UserDetails;
            if ($action == 'name') {
                $name = explode(' ', $this->name);
                $user->first_name = @$name[0];
                $user->last_name = @$name[1];
            }
            if ($action == 'contact_number') {
                $user->contact_number = $this->contact_number;
            }
            if ($action == 'email') {
                $user->email = $this->email;
            }
            $user->update();

            if ($action == 'address') {
                $userdetail->address = $this->address;
            }
            if ($action == 'about') {
                $userdetail->about = $this->about;
            }

            $userdetail->update();
            $this->fieldStatus = false;
        }
    }

    
    public function render()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('livewire.cleaner.account', ['user'=>$user]);
    }
}
