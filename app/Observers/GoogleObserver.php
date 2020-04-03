<?php

namespace App\Observers;

use App\Models\GoogleUsers;
use App\User;

class GoogleObserver
{
	/**
	 * Listen to the Google User creating event.
	 * create related user
	 * @param  GoogleUser $googleUser
	 */
	public function creating(GoogleUsers $googleUser)
	{
		$user = User::create([
			'name' => $googleUser->name,
			'email' => $googleUser->email,
			'platform' => 'google',
		]);

		$googleUser->user_id = $user->id;
		return $googleUser;
	}
}