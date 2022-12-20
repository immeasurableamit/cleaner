<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CleanerController extends Controller
{
    
    public function setLocation()
    {
        $loadMaps = true;
        return view('cleaner.set-location', compact('loadMaps') );
    }

}
