<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserDetails;

class ServicesController extends Controller
{
    //
    public function index()
    {
        $title = array(
            'title' => 'Services',
            'active' => 'services',
        );

        $user = auth()->user();

        return view('cleaner.services.index', compact('title', 'user'));
    }
}
