<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\User;
use App\Models\Services;
use App\Models\ServicesItems;
use App\Models\CleanerHours;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Profile extends Component
{
    public $cleanerId;
    public $cleaner;

    public $services;
    public $itemAddOns;


    //...fields
    public $selected_date;

    public $workingDates = [];
    public $workingDatesTimeSlot = [];


    public $todayDate, $dateFormat, $month_date;


    public $selectDateTimeSlot;
    

    public function mount()
    {
        $this->cleaner = User::findOrFail($this->cleanerId);

        $this->services = Services::with('servicesItems')
                            ->whereTypesId('1')
                            ->whereStatus('1')
                            ->get();

        $this->itemAddOns = ServicesItems::whereStatus('1')
                            ->whereHas('service', function($query){
                                $query->where('types_id', '2');
                            })
                            ->get();


        $this->todayDate = Carbon::now();

        $this->getWorkingDays($this->todayDate);
    }


    public function getWorkingDays($today)
    {
        $fromDate = $today->copy()->firstOfMonth()->startOfDay();
        $toDate = $today->addMonths('2')->copy()->endOfMonth()->startOfDay();

        $Month = date('m', strtotime($fromDate));
        $Year = date('Y', strtotime($fromDate));

        $dates = [];
        $period = CarbonPeriod::create($fromDate, $toDate);


        
        $lawyerHoursDayAll = CleanerHours::whereUsersId($this->cleaner->id)->get()->pluck('day')->toArray();

        $lawyerHoursDayArray = [];
        foreach($lawyerHoursDayAll as $day){
            array_push($lawyerHoursDayArray, $day);
        }

        $hoursDay = array_values(array_unique($lawyerHoursDayArray));


        foreach ($period as $date) {
            $day = $date->format('l');
            $ndate = $date->format('Y-m-d');

            // dd($ndate );

            ///,.....available current date
            if ($ndate >= date('Y-m-d') && in_array($day, $hoursDay)) {
                array_push($dates, $ndate);
            }
        }

        $this->workingDates = $dates;


        $this->emit('fireCalender', $this->workingDates, $fromDate);
    }



    public function slotAvailability()
    {
        $selectDate = Carbon::parse($this->selected_date);
        $date = $selectDate->format('Y-m-d');
        $dateDay = $selectDate->format("l");

        $hoursDayAll = CleanerHours::whereUsersId($this->cleaner->id)->where('day', $dateDay)->get();

        $getLeaves = [];

        ///,.....available current date
        if (@$hoursDayAll && $date >= date('Y-m-d')) {

            
            $duration = '30';

            //...
            $time_slots = array();
            $add_mins  = $duration * 60;

            foreach($hoursDayAll as $hour){
                $startTime = strtotime($hour->from_time);
                $endTime = strtotime($hour->to_time);
                while ($startTime <= $endTime) {
                    $timeSlot = [];
                    if(in_array(date("H:i:s", $startTime), $getLeaves)) {
                        $timeSlot['is_free'] = 'no';
                    }
                    else {
                        $timeSlot['is_free'] = 'yes';
                    }


                    $timeSlot['time'] = date("H:i", $startTime);
                    $time_slots[] = $timeSlot;

                    $startTime += $add_mins;

                }
            }
            $this->workingDatesTimeSlot = $time_slots;
        }
    }







    public function updatedMonthDate()
    {
        $month = $this->month_date;

        $nDate = Carbon::parse($month);

        $this->getWorkingDays($nDate);
    }


    public function updatedSelectedDate(){
        $this->slotAvailability();

    }
    


    public function render()
    {
        return view('livewire.home.profile');
    }
}
