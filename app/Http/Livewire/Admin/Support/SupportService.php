<?php

namespace App\Http\Livewire\Admin\Support;

use App\Models\SupportRequest;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class SupportService extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $user_id, $userId, $userStatus;
    public $status, $searchRecord;
    protected $listeners = ['destroy', 'changeStatus'];

    public function confirmStatus($id)
    {
        $this->userId = $id;
        $this->alert('', 'Are you sure do you want to change status?', [
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
            $userStatus = SupportRequest::find($this->userId);
            if ($userStatus->status == '1') {
                $userStatus->status = '0';
                $userStatus->save();
            } else {
                $userStatus->status = '1';
                $userStatus->save();
            }
            $this->alert('success', 'Status changed successfully');
        }
    }

    public function deleteConfirm($id)
    {
        $this->user_id = $id;
        $this->alert('', 'Are you sure do want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'No',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
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
        $searchRecord = '%' . $this->searchRecord . '%';

        $supportServices = SupportRequest::where(function ($query) use ($searchRecord) {
            $query->where('order_id', 'LIKE', $searchRecord)
                ->orWhere('description', 'LIKE', $searchRecord)
                ->orWhere('requested_resolution', 'like', '%' . $searchRecord . '%')
                ->orWhere('issue', 'like', '%' . $searchRecord . '%');
        })

            ->with(['order.user' => function ($query) use ($searchRecord) {
                $query->where('email', 'like', '%' . $searchRecord . '%')
                    ->orWhere('first_name', 'like', '%' . $searchRecord . '%')
                    ->orWhere('last_name', 'like', '%' . $searchRecord . '%');
            }])->paginate(1);

        return view('livewire.admin.support.support-service', compact('supportServices'));
    }
}
