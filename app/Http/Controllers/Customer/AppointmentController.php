<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CleanerHours;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    public $selected_date, $workingDatesTimeSlot;

    public function __construct()
    {
        $this->selected_date;
    }

    public function index()
    {
        $title = array(
            'active' => 'appointments',
            'title' => 'appointments'
        );

        return view('customer.appointments.index', compact('title'));
    }

    public function rescheduleAppointment($orderId)
    {

        $getcustomerOrders = Order::where('id', $orderId)->first();

        $cleanerID = $getcustomerOrders->cleaner_id;

        $getTimeSlotOfCleaner = CleanerHours::where('users_id', $cleanerID)->pluck('day')->toArray();

        // dd($getTimeSlotOfCleaner);
//         $getTimeFromDay = CleanerHours::whereUsersId($cleanerID)->where('day',$getTimeSlotOfCleaner)->first();



// ....

        $dayArray = [];

        foreach ($getTimeSlotOfCleaner as $day) {
            array_push($dayArray, (int) date('w', strtotime($day)));
        }
        // dd($dayArray);
        // .................



        $selectDate = Carbon::parse($this->selected_date);
        // dd($this->selected_date);
        $date = $selectDate->format('Y-m-d');
        $dateDay = $selectDate->format("l");
        $getLeaves = [];
// need a dateDay to execute this command
        $hoursDayAll = CleanerHours::whereUsersId($cleanerID)->where('day', $dateDay)->get();
        // dd($hoursDayAll);

        if (@$hoursDayAll && $date >= date('Y-m-d')) {
            $duration = '30';

            //...
            $time_slots = array();
            $add_mins  = $duration * 60;
            foreach ($hoursDayAll as $hour) {
                $startTime = strtotime($hour->from_time);
                $endTime = strtotime($hour->to_time);
                while ($startTime <= $endTime) {
                    $timeSlot = [];
                    if (in_array(date("H:i:s", $startTime), $getLeaves)) {
                        $timeSlot['is_free'] = 'no';
                    } else {
                        $timeSlot['is_free'] = 'yes';
                    }
                    $timeSlot['time'] = date("H:i", $startTime);
                    $time_slots[] = $timeSlot;

                    $startTime += $add_mins;
                }

                $this->workingDatesTimeSlot = $time_slots;
            }


            return view('customer.appointments.appointment', ['dayArray' => $dayArray]);
        }
    }

       public function slotAvailable(Request $request)
       {
        // dd("date");
        $selectDate = Carbon::parse($this->selected_date);

        $response = array(
            'status' => 'success',
            'msg'    => 'Setting created successfully',
        );

        return Response::json($response);

       }


    // public function updateScheduleAppointment()
    // {
    //     dd('update day, frome_time, to_time');


    // }
}
