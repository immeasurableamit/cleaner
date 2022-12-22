<?php

namespace App\Http\Controllers;

use App\Models\ServicesItems;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use \App\Models\Services;

class HomeController extends Controller
{
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
        /*
         * These default search paramters will be used
         * when customer directly comes to search result page
         * by clicking 'Browse now' button in home page.
         *
         */
        $deafultSearch = [
            'selectItem' => ServicesItems::first()->id,
            'address'    => 'New York, NY, USA',
            'lat'        => 40.7127753,
            'lng'        => -74.0059728,
            'homeSize'   => 2000,
        ];

        // TODO: if address is present then try to fetch lat/lng from google api
		$serviceItemId = $request->get('selectItem') ?: $deafultSearch['selectItem'];
		$address      = $request->get('address')     ?: $deafultSearch['address'];
		$homeSize      = $request->get('homeSize')   ?: $deafultSearch['homeSize'];
        $latitude      = $request->get('lat')        ?: $deafultSearch['lat'];
        $longitude     = $request->get('lng')        ?: $deafultSearch['lng'];

		$serviceItem = ServicesItems::findOrFail($serviceItemId);

		return view('home.search-result', compact('serviceItem','address','homeSize','latitude','longitude', 'serviceItemId') );

	}
}
