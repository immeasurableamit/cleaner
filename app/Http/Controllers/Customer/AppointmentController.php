<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CleanerHours;
use App\Models\Order;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

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


        $dayArray = [];

        foreach ($getTimeSlotOfCleaner as $day) {
            array_push($dayArray, (int) date('w', strtotime($day)));
        }
        // dd($dayArray);
        return view('customer.appointments.appointment', ['dayArray' => $dayArray]);
    }

    // public function convertWeekdaysToInt()
    // {

    // }


    public function updateScheduleAppointment()
    {
        dd('update day, frome_time, to_time');

        
    }
}
