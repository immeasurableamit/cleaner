<?php

namespace App\Http\Livewire\Admin\Cleaner;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetails;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Cleaner extends Component
{
    use LivewireAlert;
    public $search;
    public $dateStart, $dateEnd;
    public $cleanerStatus, $userId;
    public $allCount, $activeCount, $inactiveCount;
    public $tab = 'all';
    protected $listeners = ['changeStatus'];

    public function mount()
    {
        $this->countUsers();
    }

    public function countUsers()
    {
        $this->allCount = User::whereRole('cleaner')->count();
        $this->activeCount = User::whereRole('cleaner')->whereStatus('1')->count();
        $this->inactiveCount = User::whereRole('cleaner')->whereStatus('0')->count();
    }


    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function confirmStatus($iid)
    {
        $this->userId = $iid;
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
        $this->countUsers();
    }
}

    public function render()
    {

         $sta = null;
        if($this->tab=='active'){
            $sta = '1';
        }
        if($this->tab=='inactive'){
            $sta = '0';
        }

        $value = [];
        $value[] = 'completed';
        $value[] = 'payment_collected';
        $value[] = 'accepted';


        $users  = User::with(['orders' => function ($query) use($value) {
                    $query->whereIn('status', $value);
                }])
                ->where('role', '=', 'cleaner')
                ->withCount(['orders' => function ($query) use($value) {
                    $query->whereIn('status', $value);
                }])
                ->groupBy('id');


        if(!empty($this->search)){
            $vl = $this->search;
            $users->where(function($query) use($vl) {
                $query->where('email', 'like', '%'.$vl.'%')
                    ->orWhere('first_name', 'like', '%'.$vl.'%');
            });
        }

        if($sta == '0'){
                $users->whereStatus($sta);
          }
        if($sta == '1'){
                $users->whereStatus($sta);
            }

        $users = $users->orderBy('id', 'DESC')->get();


        foreach ($users as $key => $value) {
            $lastdate = '';
            if(count($value->orders)){
                foreach ($value->orders as $oky => $ord) {
                     $lastdate = $ord->cleaning_datetime;
                }
            }
              $users[$key]['order_lastdate'] = $lastdate;
        }

        // $users = User::whereRole('cleaner')
        //         ->where(function ($query){
        //             if($this->tab=='active'){
        //                 $query->whereStatus('1');
        //             }
        //             if($this->tab=='inactive'){
        //                 $query->whereStatus('0');
        //             }
        //         })->orderBy('id', 'DESC')
        //         ->get();


        return view('livewire.admin.cleaner.cleaner', compact('users'));
    }
}
