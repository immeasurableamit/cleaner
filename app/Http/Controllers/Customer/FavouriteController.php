<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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



    public function deleteFavouriteCleaner($id)
    {
        if ($id) {
            Favourite::find($id)->delete();
        }

        return response()->json(['status' => 'Category Deleted Successfully']);
    }

    
}
