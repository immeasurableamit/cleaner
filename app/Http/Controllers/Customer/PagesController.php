<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function appointments()
    {
        return view('customer.appointments.appointments');        
    }
}
