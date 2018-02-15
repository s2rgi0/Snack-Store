<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class UserController extends Controller
{
    //
	public function AddUser(){

		$role = Role::all();
		return view('users.users', compact('role'));
	}

	public function AddNewRoll( Request $req ){

		//dd($req->all());

		$roll = new Role;
		$roll->name = $req->usuario;
		$roll->save();
		
		return redirect()->back();
	}


}
