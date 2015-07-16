<?php

namespace TobyMaxham\Newsletter;

use Illuminate\Support\Facades\Facade;

/**
 * Class NewsletterFacade
 * @package TobyMaxham\Newsletter
 * @author Tobias Maxham <git2015@maxham.de>
 */
class NewsletterFacade extends Facade
{
	/**
	 * @return string $FacadeAccessor
	 */
	public static function getFacadeAccessor()
	{
		return 'my-lara-newsletter';
	}

} 