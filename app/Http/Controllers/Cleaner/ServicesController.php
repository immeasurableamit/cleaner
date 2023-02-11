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
