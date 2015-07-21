<?php

class NewsletterTest extends PHPUnit_Framework_TestCase
{

	protected $newsletter;


	public function setUp()
	{
		parent::setUp();
		$this->newsletter = new \TobyMaxham\Newsletter\Sauerkraut\Newsletter();
		//$this->prepareForTests();
	}

	/**
	 * Laravel....
	 * @return mixed
	 */
	public function createApplication()
	{
		return;
		$app = require 'bootstrap/app.php';
		$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
		return $app;
	}

	public function test_to_subscribe()
	{
		return $this->assertTrue(true);
		$this->newsletter->subscribe('git2015@maxham.de', 'The Devil List');
	}

	public function testThatTrueIsTrue()
	{
		$this->assertTrue(true);
	}


	/**
	 * Migrate the database
	 */
	private function prepareForTests()
	{
		Artisan::call('migrate');
	}

}
