<?php

namespace App\Http\Controllers\Cleaner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserDetails;
use App\Models\CleanerHours;


class AvailabilityController extends Controller
{
    //
    public function index()
    {
        $title = array(
            'title' => 'Availability',
            'active' => 'availability',
        );

        $user = auth()->user();

        return view('cleaner.availability.index', compact('title', 'user'));
    }


    public function jobs(Request $request)
    {
        $request->validate([
            'jobs' => 'required',
        ]);

        $store = new UserDetails;
        $store->jobs = $request->jobs;
        $store->save();

        //...
        return redirect()->route('cleaner.availability.index');
    }



    public function buffer(Request $request)
    {
        $request->validate([
            'buffer' => 'required',
        ]);

        $store = new UserDetails;
        $store->buffer = $request->buffer;
        $store->save();

        //...
        return redirect()->route('cleaner.availability.index');
    }


    public function time(Request $request)
    {

        $request->validate([
            'day' => 'required',
        ]);

        $user = auth()->user();
        $daysArray = [];
        if ($request->day) {
            foreach ($request->day as $day => $daysData) {
                if(@$daysData['selected']=='on') {
					if(@$daysData['data']){
						array_push($daysArray, $day);
						foreach(@$daysData['data'] as $data){

							if(@$data['delete']=='yes'){
								$checkHour = CleanerHours::find($data['id']);

								if (@$checkHour) {
									$checkHour->delete();
								}

							}
							else {
								if (@$data['from_time'] && $data['to_time']) {
									$hour = new CleanerHours;
									if (@$data['id']) {
										$checkHour = CleanerHours::find($data['id']);
										if (@$checkHour) {
											$hour->id = $checkHour->id;
											$hour->exists = true;
										}
									}
									$hour->users_id = $user->id;
									$hour->day = $day;
									$hour->from_time = $data['from_time'];
									$hour->to_time = $data['to_time'];
									$hour->save();
								}
							}
						}
                    }
                } else {
					$deleteDay = CleanerHours::where(['day'=>$day, 'users_id'=>$user->id])->get();
					foreach($deleteDay as $delDays){
						$delDays->delete();
					}
                }
            }
        }

        /* if($daysArray){
            $deleteDay = CleanerHours::whereNotIn('day', $daysArray)
                        ->where('users_id', $user->id)
                        ->get();
            foreach($deleteDay as $delDays){
                $delDays->delete();
            }
        } */


        //...
        return redirect()->route('cleaner.availability.index');
    }

}
