<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use DB;

class CustomerUpdate extends Component
{
    public $user, $first_name, $last_name, $address, $contact_number, $full_name;

    public $fieldStatus = false, $action;


    public function editData($userId, $action)
    {

        $user = User::with('UserDetails')->find($userId);
        $this->userId = $userId;
        // $this->user = $user;


        if ($action == 'first_name') {
            $this->first_name = $user->first_name;
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
        // if ($action == 'about') {
        //     $this->about = $user->details->about;
        // }

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

            $user = User::with('UserDetails')->find($this->userId);
            $userdetail = $user->UserDetails;

            if ($action == 'first_name') {
                // $name = explode(' ', $this->first_name);
                $user->first_name = $this->first_name;
                // $user->last_name = @$name[1];
            }
            if ($action == 'contact_number') {
                $user->contact_number = $this->contact_number;
            }
            if ($action == 'email') {
                $user->email = $this->email;
            }

            $user->update();
            // $this->user = User::with('UserDetails')->where('id', '=', $this->userId)->first();

            if ($action == 'address') {
                $userdetail->address = $this->address;
            }
            // if ($action == 'about') {
            //     $userdetail->about = $this->about;
            // }
            $userdetail->update();
            $this->fieldStatus = false;
        }
    }
   

    public function render()
    {  
       
        $this->user = User::with('UserDetails')->where('id', '=', request()->id)->first();
        return view('livewire.admin.customer-update');
    }
}
