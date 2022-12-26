<?php

namespace App\Http\Controllers;

use App\Models\ServicesItems;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use \App\Models\Services;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class HomeController extends Controller
{
    use LivewireAlert;

	public function index()
	{
		$title = array(
			'active' => 'home',
		);

		$services = Services::with('servicesItems')->where('types_id',1)->get();

		return view('home.index', compact('title','services'));
	}

	public function checkout(Request $req, $details)
	{
		$details = json_decode(Crypt::decryptString($details), true);

		return view('home.checkout', compact('details') );
	}

	public function searchResultParameters(Request $request)
	{

        /* default search paramters will be used when
         * customer comes to search page directly ( by clicking browse cleaners )
         *
         */
        if ( empty( $request->query() ) ){
            $defaultParameters = getDefaultParametersForSearchPage();
            return view("home.search-result", $defaultParameters );
        }

        $rules = [
            'selectItem' => 'required|exists:services_items,id|max:255',
            'address'    => 'required|max:255',
            'homeSize'   => 'required|numeric',
            'latitude'   => 'present|max:255',
            'longitude'  => 'present|max:255'
        ];

        $validated = $request->validate($rules);

        /* ensure lat/lng existence */
        if ( empty( $request->latitude ) || empty( $request->longitude ) ){

            /* redirect back if lat/lng of address isn't found */
            $response = getLatLngByAddress($request->address);
            if ( empty( $response ) ){
                $this->flash('error', 'Wrong address');
                return redirect()->back();
            }

            /* update lat/lng props in request object with the fetched one */
            $request->merge([
                'latitude' => $response['latitude'],
                'longitude'=> $response['longitude'],
                'address'  => $response['address'],
            ]);
        }

        $serviceItem = ServicesItems::findOrFail($request->selectItem);

        $searchParamters = [
            'serviceItem'   => $serviceItem,
            'serviceItemId' => $serviceItem->id,
            'address'       => $request->address,
            'homeSize'      => $request->homeSize,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
        ];

		return view('home.search-result', $searchParamters );

	}
}
