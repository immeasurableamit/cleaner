<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CustomerUpdate extends Component
{
    use LivewireAlert;

    public $user, $first_name, $last_name, $address, $contact_number, $full_name;
    public $user_id;
    public $new_password;

    public $fieldStatus = false, $action;

   private function resetInputFields()
    {
        $this->new_password = '';
    }

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
       $this->validate([
            'new_password' => 'required|min:8',
        ]);

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
        if ($action == 'new_password') {
            $this->user->password = Hash::make($this->new_password);
        }

        $this->user->update();

        if ($action == 'address') {
            $userdetail->address = $this->address;
        }
    
        $userdetail->update();
        $this->emit('serviceFormClose2');
        $this->fieldStatus = false;
        $this->resetInputFields();
        $this->alert('success', 'Updated successfully');
    }
       public function render()
    {
        $this->user = User::with('UserDetails')->where('id', '=', $this->user_id)->first();
        return view('livewire.admin.customer.customer-update');
    }

}