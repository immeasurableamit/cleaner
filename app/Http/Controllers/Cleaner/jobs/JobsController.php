<?php

namespace App\Http\Controllers\Cleaner\jobs;

use App\Http\Controllers\Controller;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Models\Time_zone;

class JobsController extends Controller
{
    public function index()
    {
        $title = array(
            'title' => 'Jobs',
            'active' => 'jobs',
        );

        $user = auth()->user();
        $timezone = $user->userDetails->timeZone;

        return view('cleaner.jobs.jobs', compact('title', 'timezone'));
    }
}
