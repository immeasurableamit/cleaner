<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{

    public function index()
    {
        $title = array(
            'active' => 'favourite',
            'title' => 'favourite'
        );

        $user_id = auth()->user()->id;

        $customerFavouriteRecord = Favourite::with('cleaner')->get();

        return view('customer.favourite.index', compact('title', 'customerFavouriteRecord'));
    }



    public function deleteFavouriteCleaner($cleaner_id)
    {
        if ($cleaner_id) {
            Favourite::find($cleaner_id)->delete();
        }

        return redirect()->route('customer.favourite.index');
    }
}
