<?php

namespace App\Http\Livewire\Admin\Support;

use App\Models\SupportRequest;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SupportService extends Component
{
    use LivewireAlert;
    public $user_id, $userId, $userStatus;
    public $status;
    protected $listeners = ['destroy', 'changeStatus'];

    public function confirmStatus($iid)
    {
        $this->userId = $iid;
        // dd( $this->userId);
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
        if ($this->userId) {
            $userStatus = SupportRequest::find($id);
dd($userStatus);
            if ($userStatus->status == '1') {

                $userStatus->status = '0';
                $userStatus->save();
            } else {
                $userStatus->status = '1';
                $userStatus->save();
            }
        }
    }

    public function deleteConfirm($id)
    {
        $this->user_id = $id;
        dd($this->user_id);
        $this->alert('warning', 'Are you sure do want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Delete it',
            'onConfirmed' => 'destroy',
            'timer' => null
        ]);
    }

    public function destroy($id)
    {
        if ($this->user_id) {
            SupportRequest::find($this->user_id)->delete();
        }
        $this->alert('success', 'Deleted successfully');
    }

    public function render()
    {
        $supportServices = SupportRequest::with('order.user')->get();

        return view('livewire.admin.support.support-service', compact('supportServices'));
    }
}
