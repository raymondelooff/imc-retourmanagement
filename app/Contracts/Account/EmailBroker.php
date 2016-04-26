<?php

namespace App\Contracts\Account;

use Closure;

interface EmailBroker
{

	/**
	 * Send a email verification link to a user.
	 * 
	 * @param array $credentials
	 * @param Closure|null $callback
	 * @return mixed
	 */
	public function sendResetLink(array $credentials, Closure $callback = null);
}