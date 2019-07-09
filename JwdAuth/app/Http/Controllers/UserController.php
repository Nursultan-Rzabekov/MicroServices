<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function getAll(){
		$users = User::get();
		return $users;
	}
    public function get(User $user){
    	//dd($user);
    	if($user->active_user == $user::NONACTIVE){
    		return $user::Message;
    	}
    	else{
    		return $user;
    	}
	}
	public function create(Request $request){
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);

		$user->save();
		return $user;
	}

	public function update(User $user , Request $request){
		$user->name = $request->name;
		$user->save();
		return $user;
	}

	public function destroy(User $user){
		//dd($user->active_user,$user->ACTIVE);
		if($user->active_user == $user::ACTIVE or $user->active_user == $user::NONACTIVE){
			$user->active_user = $user::NONACTIVE;
			$user->save();
		}
		return $user;
	}
}