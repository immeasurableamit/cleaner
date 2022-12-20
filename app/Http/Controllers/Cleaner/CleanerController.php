<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class CleanerController extends Controller
{
    use LivewireAlert;

    public function showSetLocationPage()
    {
        $user = auth()->user();
        $latLngForMap = [];
        if ( $user->UserDetails->latitude and $user->UserDetails->longitude ) {
            $latLngForMap['lat'] = (float) $user->UserDetails->latitude;
            $latLngForMap['lng'] = (float) $user->UserDetails->longitude;
        }

        return view('cleaner.set-location', compact('user', 'latLngForMap') );
    }

    public function setLocation(Request $request)
    {
        $cleaner = auth()->user();

        $cleanerUserDetails = $cleaner->UserDetails;
        $cleanerUserDetails->serve_radius_in_meters = $request->radius;
        $cleanerUserDetails->serve_center_lat       = $request->latitude;
        $cleanerUserDetails->serve_center_lng       = $request->longitude;
        $cleanerUserDetails->save();

        $this->flash('success', 'Location set');
        return redirect()->route('cleaner.set-location-page');
    }

}
