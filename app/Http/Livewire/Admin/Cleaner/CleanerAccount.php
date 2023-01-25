<?php

namespace App\Http\Livewire\Admin\Cleaner;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;

class CleanerAccount extends Component
{   
    public $user, $first_name, $last_name, $address, $contact_number, $full_name, $Team_name;
    public $user_id;
    public $new_password;

    public $fieldStatus = false, $action;


     public function editData($action)
    {
        if ($action == 'Team_name') {
            $this->Team_name = $this->user->first_name .' '.$this->user->last_name;
        }

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
        //$cleanerTeam = $this->user->cleanerTeam;


        if ($action == 'Team_name') {
            $name = explode(' ', $this->Team_name);
            $this->user->first_name = @$name[0];
            $this->user->last_name = @$name[1];
        }

        if ($action == 'first_name') {
            $name = explode(' ', $this->first_name);
            $this->user->first_name = @$name[0];
            $this->user->last_name = @$name[1];
        }
        if ($action == 'contact_number') {
            $this->user->contact_number = $this->contact_number;
        }
        if ($action == 'new_password') {
            $this->user->password = Hash::make($this->new_password);
        }

        $this->user->update();

        if ($action == 'address') {
            $userdetail->address = $this->address;
        }
    
        if($userdetail){
            $userdetail->update();
        }
       // if($cleanerTeam){
       // $cleanerTeam->update();
        //}
        $this->fieldStatus = false;

    }

    public function render()
    {   
         $this->user = User::with('UserDetails')->where('id', '=', $this->user_id)->first();
        return view('livewire.admin.cleaner.cleaner-account');
    }
}

