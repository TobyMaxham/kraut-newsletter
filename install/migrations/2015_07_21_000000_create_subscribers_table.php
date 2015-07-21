<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tmx_subscribers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('uid', 36);

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tmx_subscribers');
	}

}
