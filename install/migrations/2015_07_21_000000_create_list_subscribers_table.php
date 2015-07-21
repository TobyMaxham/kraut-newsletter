<?php
include_once './vendor/TobyMaxham/kraut-newsletter/src/Model/NewsletterList.php';
include_once './vendor/TobyMaxham/kraut-newsletter/src/Model/Subscriber.php';
include_once './vendor/TobyMaxham/kraut-newsletter/src/Model/UID.php';


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListSubscribersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tmx_list_subscriber', function(Blueprint $table)
		{
			$table->integer('list');
			$table->integer('subscriber');

			$table->unique(['list', 'subscriber']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tmx_list_subscriber');
	}

}
