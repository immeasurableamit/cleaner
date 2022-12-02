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

        $user = auth()->user();

        $types = Types::with(['services', 'services.servicesItems'])->get();
        $cservices = CleanerServices::with('servicesItems')->where('users_id', $user->id)->get();
        

        $cservicesItems = $cservices->where('status', 1 )->pluck('servicesItems.services_id')->toArray();
        $cservicesItems = array_unique($cservicesItems); 
        
        return view('cleaner.services.index', compact('title', 'user', 'types', 'cservices', 'cservicesItems'));
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
