<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract {

    public function toResponse($request)
     {		

		$user = auth()->user();
		
		if($user->role == 'customer'){
			
			return redirect()->route('customer.account');
			
			
		} elseif($user->role == 'cleaner')
		{
			return redirect()->route('cleaner.account');
		}
		
	
		
		return redirect()->route('home.signup');
    }
}