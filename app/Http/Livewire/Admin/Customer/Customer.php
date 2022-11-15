<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\State;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Customer extends Component
{
    use LivewireAlert;
    public $userId;
    protected $listeners = ['changeStatus'];

    public function confirmStatus($iid)
    {
        $this->userId = $iid;
        $this->alert('warning', 'Are you sure do you want to change status?', [
			'toast' => false,
			'position' => 'center',
			'showCancelButton' => true,
			'cancelButtonText' => 'Cancel',
			'showConfirmButton' => true,
			'confirmButtonText' => 'Change it',
			'onConfirmed' => 'changeStatus',
			'timer' => null
		]);
    }

    public function changeStatus($id)
    {
        if($this->userId){
        $cleanerStatus = User::find($this->userId);
    
        if ($cleanerStatus->status == '1') {
            $cleanerStatus->status = '0';
            $cleanerStatus->save();
        } else {
            $cleanerStatus->status = '1';
            $cleanerStatus->save();
        }
        $this->alert('success', 'Status changed successfully');
    }
}

    public function render()
    {
         $users = User::where('role', '=', 'customer')->get();
         
         return view('livewire.admin.customer.customer', compact('users'));
    }
}