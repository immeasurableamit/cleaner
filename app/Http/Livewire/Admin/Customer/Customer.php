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
    public $search;
    public $dateStart, $dateEnd;
    public $allCount, $activeCount, $inactiveCount;
    public $tab = 'all';
    protected $listeners = ['changeStatus'];

    public function mount()
    {
        $this->countUsers();
    }

    public function countUsers()
    {
        $this->allCount = User::whereRole('customer')->count();
        $this->activeCount = User::whereRole('customer')->whereStatus('1')->count();
        $this->inactiveCount = User::whereRole('customer')->whereStatus('0')->count();
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
            // dd($sta);
        }

        $value = [];
        $value[] = 'completed';
        $value[] = 'payment_collected';
        $value[] = 'reviewed';


        $users  = User::with(['orders' => function ($query) use($value) {
                    $query->whereIn('status', $value);

                }])
                ->where('role', '=', 'customer')
                ->withCount(['orders' => function ($query) use($value) {
                    $query->whereIn('status', $value);
                }])
                ->groupBy('id');



        if(!empty($this->dateStart) && !empty($this->dateEnd)) {

            $users->whereBetween('created_at', [$this->dateStart, $this->dateEnd]);
        }

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

            $cnt = 0;
            $lastdate = '';
            if(count($value->orders)){
                foreach ($value->orders as $oky => $ord) {
                    $cnt = $cnt + $ord->total;
                    $lastdate = $ord->cleaning_datetime;
                }
            }
            $users[$key]['total_sum'] = $cnt;
            $users[$key]['order_lastdate'] = $lastdate;

        }      
         

        }

   
        return view('livewire.admin.customer.customer', compact('users'));
    }
}
