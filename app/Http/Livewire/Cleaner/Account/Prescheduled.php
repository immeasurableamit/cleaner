<?php

namespace App\Http\Livewire\Cleaner\Account;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Models\CleanerPrescheduledOffTime;


class Prescheduled extends Component
{
    use LivewireAlert;

    public $user;
    public $offTime;


    public $dataArray = [];

    public $timeId;
    protected $listeners = ['confirmedDelete'];

    public function mount()
    {
        $this->user = auth()->user();
        $this->addLayout();
    }

    public function getData()
    {
        $this->offTime = CleanerPrescheduledOffTime::where('user_id', $this->user->id)->get();
    }


    public function addLayout()
    {
        $data = $this->dataArray;
        $newArray = [];
        $newArray['date'] = '';
        $newArray['from_time'] = null;
        $newArray['to_time'] = null;
        array_push($data, $newArray);

        //...
        $this->dataArray = $data;
    }

    public function removeLayout($i)
    {
        unset($this->dataArray[$i]);
    }


    public function store()
    {
        $this->validate([
            'dataArray.*.date' => 'required',
            'dataArray.*.from_time' => 'required_with:dataArray.*.to_time',
            'dataArray.*.to_time' => 'required_with:dataArray.*.from_time',
        ],
        [
            'dataArray.*.date.required' => 'Date is required.',
            'dataArray.*.from_time.required_with' => 'From time is required.',
            'dataArray.*.to_time.required_with' => 'To time is required.',
        ]
        );


        $existDate = $this->offTime->pluck('date')->toArray();

        foreach($this->dataArray as $data){

            if(in_array($data['date'], $existDate)){
               return $this->alert('success','Already Date Exist');
            }else{
                $store = new CleanerPrescheduledOffTime;
                $store->user_id = $this->user->id;
                $store->date = $data['date'];
                // $store->from_time = $data['from_time'] ? $data['from_time'] : null;
                $store->from_time = $data['from_time'] ? $data['from_time'] : today()->startOfDay()->toTimeString();
                $store->to_time = $data['to_time'] ? $data['to_time'] : today()->endOfDay()->toTimeString();
                $store->save();
            }

        }

        $this->resetFields();
        $this->alert('success', 'Off Time Saved');

    }

    public function resetFields()
    {
        $this->dataArray = [];
        $this->addLayout();
    }


    public function delete($id){
        $this->timeId = $id;

        $this->alert('', 'Are you sure to delete?', [
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'onConfirmed' => 'confirmedDelete',
            'allowOutsideClick' => false,
            'timer' => null
        ]);
    }


    public function confirmedDelete()
    {
        $data = CleanerPrescheduledOffTime::findOrFail($this->timeId);

        $data->delete();

        $this->alert('success', 'Off Time Removed');
    }


    public function render()
    {
        $this->getData();
        return view('livewire.cleaner.account.prescheduled');
    }
}
