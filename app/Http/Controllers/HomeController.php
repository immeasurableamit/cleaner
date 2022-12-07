<?php

namespace App\Http\Controllers;

use App\Models\ServicesItems;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
	public function index()
	{
		$title = array(
			'active' => 'home',
		);

		return view('home.index', compact('title'));
	}

	public function checkout(Request $req, $details)
	{		
		$details = json_decode(Crypt::decryptString($details), true);
		
		return view('home.checkout', compact('details') );

		$cleaner     = User::findOrFail( $details->cleanerId );
		$datetime    = Carbon::createFromFormat("Y-m-d H:i:s", "$details->date $details->time")->toDayDateTimeString();
		$homeSize    = $details->homeSize;
		
		$selectedServicesIds = array_merge( [ $req->serviceItemId ], $details->addOnIds );
		$selectedServices    = ServicesItems::find( $selectedServicesIds );

		$estimatedDuration   = $selectedServices->sum('duration');

		/* Put price attribute for each service in object */
		foreach ( $selectedServices as $selectedService ) {
			$selectedService->price = $selectedService->priceForSqFt($homeSize);
		}
		
		return view('home.checkout', compact(
			'cleaner',
			'serviceItem',
			'addOn',
			'datetime',
			'homeSize',
		));
	}
}
