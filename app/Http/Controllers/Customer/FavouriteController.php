<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Review;
use App\Models\Order;
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
        $favourites = Favourite::where('user_id', $user_id )->with('cleaner.cleanerReviews')->get();

        return view('customer.favourite.index', compact('favourites') );
    }


    public function deleteFavouriteCleaner($id)
    {
        if ($id) {
            Favourite::find($id)->delete();
        }

        return response()->json(['status' => 'Category Deleted Successfully']);
    }

    public function cleanerRating()
    {

    }

}
