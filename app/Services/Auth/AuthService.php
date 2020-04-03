<?php

namespace App\Services\Auth;

use App\User;
use Illuminate\Http\Request;
use Auth;

class AuthService
{
	public function loginOrRegister(Request $request)
	{
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'platform' => 'origin'])) {
			// login input correct
			return true;
		} elseif (User::where(['email' => $request->email, 'platform' => 'origin'])->first()) {
			// check email exist but incorrect password
			return false;
		} else {
			// email not exist register and login
			$user = User::create([
				'email' => $request->email,
				'password' => bcrypt($request->password),
				'platform' => 'origin'
			]);
			Auth::login($user);
			return true;
		}
	}
}
