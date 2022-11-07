<?php

namespace App\Http\Responses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract {

    public function toResponse($request) {		

		$user = auth()->user();
		// dd($user, 'login');
		if($user->role=='customer'){
			
				return redirect()->route('customer.account');
		}

		elseif($user->role=='cleaner')
		{
			return redirect()->route('cleaner.account');
		}
		
		elseif($user->role=='admin')
		{
			return redirect()->route('admin-customer');
		}
	
		
		return redirect()->route('home.signup');
    }
}