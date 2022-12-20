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
		$serviceItemId= $request->get('selectItem');
		$location = $request->get('address');
		$homeSize =$request->get('homeSize');
	
		$serviceItem = ServicesItems::findOrFail($serviceItemId);



		return view('home.search-result', compact('serviceItem','location','homeSize') );

	}
}
