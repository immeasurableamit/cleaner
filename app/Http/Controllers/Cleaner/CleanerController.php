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
        $user        = auth()->user();
        $userDetails = $user->UserDetails;


        /* Make lat/lng and radius ready for the map */
        $latLngForMap        = [];
        $radiusInMilesForMap = 25;

        $serveLocationAlreadySet          = $userDetails->serve_center_lat &&  $userDetails->serve_center_lng && $userDetails->serve_radius_in_meters;
        $userLocationCoordinatesAvailable = $userDetails->latitude && $userDetails->longitude;

        if ( $serveLocationAlreadySet ) {

            $latLngForMap['lat'] = (float) $userDetails->serve_center_lat;
            $latLngForMap['lng'] = (float) $userDetails->serve_center_lng;
            $radiusInMilesForMap = (int)   convertMetersIntoMiles( $userDetails->serve_radius_in_meters );

        } elseif ( $userLocationCoordinatesAvailable ) {

            $latLngForMap['lat'] = (float) $userDetails->latitude;
            $latLngForMap['lng'] = (float) $userDetails->longitude;
        } else {

            /* New york's lat/lng will be used as default if there is not lat lng set */
            $latLngForMap['lat'] = 40.730610;
            $latLngForMap['lng'] = -73.935242;
        }

        return view('cleaner.set-location', compact('user', 'latLngForMap', 'radiusInMilesForMap', 'serveLocationAlreadySet') );
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
