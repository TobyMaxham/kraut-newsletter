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


	/**
	 * Bootstrap the application events.
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../install/migrations/' => database_path('/migrations')
		], 'migrations');

		$this->publishes([
			__DIR__ . '/../install/kraut-newsletter.php' => config_path('kraut-newsletter.php')
		], 'config');
	}

	public function register()
	{
		$this->app->bind(
			'my-lara-newsletter',
			'TobyMaxham\Newsletter\Sauerkraut\Newsletter'
		);

	}


}


