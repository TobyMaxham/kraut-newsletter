<?php

namespace TobyMaxham\Newsletter;

use Illuminate\Support\ServiceProvider;

/**
 * Class NewsletterServiceProvider
 * @package TobyMaxham\Newsletter
 * @author Tobias Maxham <git2015@maxham.de>
 */
class NewsletterServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->bind(
			'my-lara-newsletter',
			'TobyMaxham\Newsletter\Sauerkraut\Newsletter'
		);

	}


}


