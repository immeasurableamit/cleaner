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
		$details = json_decode(Crypt::decryptString($details));

		$cleaner     = User::findOrFail( $details->cleaner_id );
		$serviceItem = ServicesItems::find( $details->service_item_id );
		$addOn       = ServicesItems::find( $details->add_on_id );
		$datetime    = Carbon::createFromFormat("Y-m-d H:i:s", "$details->date $details->time")->toDayDateTimeString();
		$homeSize    = $details->home_size;
		//dd( $details );
	
		return view('home.checkout', compact(
			'cleaner',
			'serviceItem',
			'addOn',
			'datetime',
			'homeSize',
		));
	}
}
