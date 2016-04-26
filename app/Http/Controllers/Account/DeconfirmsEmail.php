<?php

namespace App\Http\Controllers\Account;

trait DeconfirmsEmail
{
	/**
	 * Sets confirmed email to false for the given user
	 *
	 * @param $user
	 */
	protected function deconfirmEmail($user)
	{
		$user->forceFill([
			'confirmed_email' => 0
		])->save();
		
		// Send email verification email
		$this->sendVerificationLinkEmail();
	}
	
	protected function sendVerificationLinkEmail()
	{

	}
}