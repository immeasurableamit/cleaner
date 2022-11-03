<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function edit($id){

        $users = User::with('UserDetails')->findOrFail($id);

        return view("admin.customer.edit-customer", compact('users'));
    }

    public function view($id){
         
       $users = User::with('UserDetails')->where('id', '=', $id)->first();
    
       return view("livewire.admin.customer-update", compact('users'));

    }

    public function update(Request $request){

    }
}
