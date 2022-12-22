<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    
    public function index()
    {
        $title = array(
			'active' => 'appointment',
            'title' => 'title'
		);
        return view('customer.appointments.index', compact('title'));        
    }

    
}
