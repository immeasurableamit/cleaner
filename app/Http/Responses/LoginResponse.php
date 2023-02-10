<?php

namespace App\Http\Responses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract {

    public function toResponse($request) {		

		$user = auth()->user();

		if($user->role=='customer' && $user->status != '0'){
			
			return redirect()->route('customer.account');
		}

		elseif($user->role=='cleaner' && $user->status != '0')
		{
			return redirect()->route('cleaner.account');
		}
		
		elseif($user->role=='admin')
		{
			return redirect()->route('admin.jobs');
		}

		else{

		Auth::logout();
		return redirect()->route('login')->with('message', 'Account deactivated by admin, To continue using CanaryCleaners please contact our Support(Email)');
		}
		
    }
}