<?php

namespace App\Http\Livewire\Cleaner\Account;

use Livewire\Component;

use App\Models\User;
use App\Models\CleanerHours;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Availability extends Component
{
    use LivewireAlert;
    public $user, $days;


    public function mount() {
        $this->user = auth()->user();
        $days = User::getDays();

        $dayArray = [];
        foreach($days as $day){
            $hours = $this->user->cleanerHours()->where('day', $day)->get();

            $dayArray[$day]['selected'] = count($hours)>0 ? 'on' : false;
            //$dayArray[$day]['selected'] = count($hours)>0 ? 'on' : 'off';

            if(count($hours)>0) {

                $hoursArray = [];
                foreach($hours as $i => $hour) {
                    $hoursData = [];
                    $hoursData['id'] = @$hour->id;
                    $hoursData['delete'] = 'no';
                    $hoursData['from_time'] = @$hour->from_time;
                    $hoursData['to_time'] = @$hour->to_time;

                    array_push($hoursArray, $hoursData);
                }

                $dayArray[$day]['data'] = $hoursArray;
            }
            else {

                $hoursArray = [];

                $hoursData = [];
                $hoursData['from_time'] = '';
                $hoursData['to_time'] = '';
                array_push($hoursArray, $hoursData);

                $dayArray[$day]['data'] = $hoursArray;
            }
        }

        
        $this->days = $dayArray;
        //dd($this->days);
    }

    public function addLayout($day){        
        $hoursArray = $this->days[$day]['data'];

        $hoursData = [];
        $hoursData['from_time'] = '';
        $hoursData['to_time'] = '';
        array_push($hoursArray, $hoursData);

        //...
        $this->days[$day]['data'] = $hoursArray;
    }


    public function deleteLayout($day, $index){        
        
        unset($this->days[$day]['data'][$index]);
    }

    public function store(){
        $this->validate([
                'days.*.data.*.from_time' => 'required_if:days.*.selected,on',
                'days.*.data.*.to_time' => 'required_if:days.*.selected,on',
            ],
            [
                'days.*.data.*.from_time.required_if' => 'From date is required.',
                'days.*.data.*.to_time.required_if' => 'To date is required.',
            ]
        );



        $user = auth()->user();
        $daysArray = [];
        if ($this->days) {
            foreach ($this->days as $day => $daysData) {
                if(@$daysData['selected']=='on') {
                    if(@$daysData['data']){
                        array_push($daysArray, $day);
                        foreach(@$daysData['data'] as $data){

                            if(@$data['delete']=='yes'){
                                $checkHour = CleanerHours::find($data['id']);

                                if (@$checkHour) {
                                    $checkHour->delete();
                                }

                            }
                            else {
                                if (@$data['from_time'] && $data['to_time']) {
                                    $hour = new CleanerHours;
                                    if (@$data['id']) {
                                        $checkHour = CleanerHours::find($data['id']);
                                        if (@$checkHour) {
                                            $hour->id = $checkHour->id;
                                            $hour->exists = true;
                                        }
                                    }
                                    $hour->users_id = $user->id;
                                    $hour->day = $day;
                                    $hour->from_time = $data['from_time'];
                                    $hour->to_time = $data['to_time'];
                                    $hour->save();
                                }
                            }
                        }
                    }
                } else {
                    $deleteDay = CleanerHours::where(['day'=>$day, 'users_id'=>$user->id])->get();
                    foreach($deleteDay as $delDays){
                        $delDays->delete();
                    }
                }
            }
        }


        $this->alert('success', 'Availability hours saved');
        
    }
    

    public function render()
    {
        return view('livewire.cleaner.account.availability');
    }
}
