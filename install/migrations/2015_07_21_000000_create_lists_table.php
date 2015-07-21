<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tmx_lists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('uid', 36);

			$table->timestamps();
			$table->softDeletes();

			//$table->primary('id');
			//$table->index('uid');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tmx_lists');
	}

}
