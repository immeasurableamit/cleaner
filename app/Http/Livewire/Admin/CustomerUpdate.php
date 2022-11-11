<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;

class CustomerUpdate extends Component
{

    public $user, $first_name, $last_name, $address, $contact_number, $full_name;
    public $user_id;

    public $fieldStatus = false, $action;

   

    public function editData($action)
    {
    

        if ($action == 'first_name') {
            $this->first_name = $this->user->first_name .' '.$this->user->last_name;
        }
        if ($action == 'contact_number') {
            $this->contact_number = $this->user->contact_number;
        }

        if ($action == 'address') {
            $this->address = $this->user->UserDetails->address;
        }

        $this->action = $action;
        $this->fieldStatus = true;
    }

    public function cancel()
    {
        $this->fieldStatus = false;
    }

    public function updateData($action)
    {

        $userdetail = $this->user->UserDetails;
        if ($action == 'first_name') {
            $name = explode(' ', $this->first_name);
            $this->user->first_name = @$name[0];
            $this->user->last_name = @$name[1];
        }
        if ($action == 'contact_number') {
            $this->user->contact_number = $this->contact_number;
        }
        if ($action == 'email') {
            $this->user->email = $this->email;
        }

        $this->user->update();

        if ($action == 'address') {
            $userdetail->address = $this->address;
        }
    
        $userdetail->update();
        $this->fieldStatus = false;

    }
   

    public function render()
    {  
        $this->user = User::with('UserDetails')->where('id', '=', $this->user_id)->first();
     
        return view('livewire.admin.customer-update');
    }
}
