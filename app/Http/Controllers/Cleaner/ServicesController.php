<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserDetails;
use App\Models\Types;
use App\Models\CleanerServices;

class ServicesController extends Controller
{
    //
    public function index()
    {
        $title = array(
            'title' => 'Services',
            'active' => 'services',
        );

        /* 
         *------------------------
         *   IMPORTANT NOTE!     |
         * -----------------------
         * 
         * If Custom Offerings are not getting appear in set-services page
         * then please verify following requirements:
         * 
         * 1. An entry should be added with id of '3' in 'types' table ( other cleanings )
         * 2. An entry should be added in 'services' table with 'types_id' set to '3'
         * 
         */
        
        return view('cleaner.services.index', compact('title'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required|array',
        ]);

        $user = auth()->user();
        updateServicesOfCleaners( $user, $request->service );
        
        return redirect()->route('cleaner.services.index');
    }



}
