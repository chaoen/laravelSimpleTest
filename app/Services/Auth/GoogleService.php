<?php

namespace App\Services\Auth;

use Socialite;
use App\Models\GoogleUsers;
use App\User;
use Auth;

class GoogleService
{
	public function redirectToProvider()
	{
		return Socialite::driver('google')->redirect();
	}

	public function loginOrRegister()
	{
		$userInfo = Socialite::driver('google')->user();

		$googleUser = GoogleUsers::firstOrCreate([
			'name' => $userInfo['name'],
			'email' => $userInfo['email'],
			'google_id' => $userInfo['id']
		]);

		Auth::login($googleUser->user);
		return;
	}
}
