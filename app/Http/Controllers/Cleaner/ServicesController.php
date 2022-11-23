<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserDetails;
use App\Models\Types;
use App\Models\CleanerServices;

class ServicesController extends Controller
{
    //
    public function index()
    {
        $title = array(
            'title' => 'Services',
            'active' => 'services',
        );

        $user = auth()->user();

        $types = Types::with(['services', 'services.servicesItems'])->get();
        $cservices = CleanerServices::where('users_id', $user->id)->get();
        $cservicesItems = $cservices->pluck('servicesItems.services_id')->toArray();

        $cservicesItems = array_unique($cservicesItems);
        //...
        return view('cleaner.services.index', compact('title', 'user', 'types', 'cservices', 'cservicesItems'));
    }


    //
    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required|array',
        ]);

        $user = auth()->user();

        foreach(@$request->service as $service){
            //dd($service);
            if(@$service['checked']=='on'){
                foreach(@$service['item'] as $sid => $item){

                    //dd($item);
                    if(@$item['checked']=='on'){
                        $store = new CleanerServices;
                        $store->users_id = $user->id;
                        $store->services_items_id = @$sid;
                        $store->price = $item['price'];
                        $store->duration = $item['duration'];
                        $store->status = '1';
                        $store->save();
                    }
                }
            }
        }


        return redirect()->back();
    }



}
