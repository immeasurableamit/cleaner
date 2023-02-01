<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;

class AdminController extends Controller
{

    public function teamView($id){


        $members = User::with('cleanerTeam')->where('id', '=', $id)->get();

        return view("admin.TeamMember.teammember", compact('members'));
    }


//     public function socialLinks()
//     {
//         dd('in controller');
//         $socialProfile = Setting::findOrFail('1');
//         // dd($socialProfile->facebook_link);

//         $facebook = $socialProfile->facebook_link;
// // dd($facebook);
//         return back();
//         // return view('layouts.includes.footer');
//     }


}
