<?php

namespace App\Http\Controllers;

use App\Models\ServicesItems;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use \App\Models\Services;
use App\Models\Types;
use App\Services\CleanerAvailability;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Contracts\Encryption\DecryptException;

class HomeController extends Controller
{
    use LivewireAlert;

	public function index()
	{
		$title = array(
			'active' => 'home',
            'title' =>'home'
		);

		$services = Services::with('servicesItems')->where('types_id',1)->get();

		return view('home.index', compact('title','services'));
	}

	public function checkout(Request $req, $details)
	{
		$details = json_decode(Crypt::decryptString($details), true);
//        dd($details);
        
        $cleaner   = User::find( $details['cleanerId']);
        $startTime = $details['time'];
        $endTime   =  Carbon::parse( $startTime )->addMinutes( config('app.cleaner_slot_interval_in_minutes') )->toTimeString();
        $slot      = [ 'start_time' => $startTime, 'end_time' => $endTime ];

        $cleanerAvailability = new CleanerAvailability($cleaner);
        $isSlotAvailable = $cleanerAvailability->isSlotAvailable( $details['selected_date'], $slot );
        if ( ! $isSlotAvailable ) {
            return redirect()->route('index');
        }
        

        
        

		return view('home.checkout', compact('details') );
	}

	public function searchResultParameters(Request $request)
	{

        /*
         * default search paramters will be used when
         * customer comes to search page directly ( for eg. clicking browse cleaners )
         *
         */
        if ( empty( $request->query() ) ){
            $defaultParameters = getDefaultParametersForSearchPage();
            return redirect()->route('search-result', $defaultParameters );
        }

        $rules = [
            //'selectItem' => 'required|exists:services_items,id|max:255',
            'selectItem' => 'nullable|max:255',
            'homeSize'   => 'nullable|numeric',
            'address'    => 'required|max:255',
            'latitude'   => 'present|max:255',
            'longitude'  => 'present|max:255'
        ];

        $validated = $request->validate($rules);

        /* ensure lat/lng existence */
        if ( empty( $request->latitude ) || empty( $request->longitude ) ){

            /* redirect back if lat/lng of address isn't found */
            $response = getLatLngByAddress($request->address);
            if ( empty( $response ) ){
                $this->flash('error', 'Wrong address');
                return redirect()->back();
            }

            /* update lat/lng props in request object with the fetched one */
            $request->merge([
                'latitude' => $response['latitude'],
                'longitude'=> $response['longitude'],
                'address'  => $response['address'],
            ]);
        }
        
        
        $serviceItem = ServicesItems::find($request->selectItem);
        if ( ! $serviceItem ) {
            $serviceItem = Services::whereTypesId( Types::ONE_TIME_SERVICE_TYPE )->first()->items->first();
        }

        $searchParamters = [
            'serviceItem'   => $serviceItem,
            'serviceItemId' => $serviceItem->id,
            'address'       => $request->address,
            'homeSize'      => $request->homeSize ?? 1500,
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
        ];

		return view('home.search-result', $searchParamters );

	}

    public function checkoutCompleted(Request $request, $encrypted_order_id)
    {
        try {
            $orderId = Crypt::decryptString($encrypted_order_id);
        } catch (DecryptException $e) {
            abort(403);
        };

        $order = Order::find( $orderId );

        return view('home.checkout-completed');
    }

    public function redirectUserToAccountPage(Request $req)
    {
        $user = $req->user();
        $routeNamesForEachUserRole = [
            'admin'    => 'admin.customer',
            'customer' => 'customer.account',
            'cleaner'  => 'cleaner.account',
        ];

        $routeName = $routeNamesForEachUserRole[strtolower($user->role)];
        return redirect()->route($routeName);
    }
}
