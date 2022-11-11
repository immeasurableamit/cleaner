<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    public function teamView($id){


        $members = User::with('cleanerTeam')->where('id', '=', $id)->get();
     
        return view("admin.TeamMember.teammember", compact('members'));
    }
}
