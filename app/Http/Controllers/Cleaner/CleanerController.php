<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
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

        $serveLocationAlreadySet                 = $userDetails->serve_center_lat &&  $userDetails->serve_center_lng && $userDetails->serve_radius_in_meters;
        $userAddressLocationCoordinatesAvailable = $userDetails->latitude && $userDetails->longitude;

        if ( $serveLocationAlreadySet ) {

            $latLngForMap['lat'] = (float) $userDetails->serve_center_lat;
            $latLngForMap['lng'] = (float) $userDetails->serve_center_lng;
            $radiusInMilesForMap = (int)   convertMeters( $userDetails->serve_radius_in_meters, "miles" );

        } elseif ( $userAddressLocationCoordinatesAvailable ) {

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

        return response()->json(['success' => true, 'message' => 'Location set']);
    }

    public function showInsurancePage()
    {
        $user   = auth()->user();
        $policy = thimbleSearchPolicyByEmail( $user->email );

        if ( ! empty( $policy ) && $user->UserDetails->is_insured == 0 ){
            $user->UserDetails->is_insured = 1;
            $user->UserDetails->save();
        }

        return view('cleaner.insurance', compact('policy','user')  );
    }

    public function redirectToInsuranceProvider()
    {
        $user     = auth()->user();
        $response = thimbleGenerateBuyInsuranceLinkFor($user);

        if ( isset($response['purchase_link']) ){
            return redirect( $response['purchase_link'] );
        }

        $this->flash('error', $response['quote_summary']['quote_result']);
        return redirect()->route('cleaner.insurance');
    }

    public function toggleOrganicService()
    {
        $user        = auth()->user();
        $userDetails = $user->UserDetails;

        $isAlreadyEnabled = $userDetails->provide_organic_service == 1;
        $userDetails->provide_organic_service = $isAlreadyEnabled ? 0 : 1;
        $userDetails->save();

        $responseText = "Organic service ";
        $responseText .= $isAlreadyEnabled ? 'disabled' : 'enabled';
        return response()->json([
            'success' => true,
            'text' => $responseText,
        ]);
    }

    public function reviews()
    {
        $title = array(
            'title' => 'Reviews',
            'active' => 'reviews',
        );

        $reviews = Review::with('user')->where('cleaner_id', auth()->user()->id )->get();

        return view('cleaner.reviews.reviews', compact('title','reviews'));
    }
}
