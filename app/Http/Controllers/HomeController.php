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
	}
}
