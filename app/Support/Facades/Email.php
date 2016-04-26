<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Contracts\Account\EmailBroker
 */
class Email extends Facade
{
	/**
	 * Constant representing a successfully sent reminder.
	 *
	 * @var string
	 */
	const VERIFICATION_LINK_SENT = 'emails.sent';

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'account.email';
	}
}