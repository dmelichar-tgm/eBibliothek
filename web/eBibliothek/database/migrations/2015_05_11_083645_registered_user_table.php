<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisteredUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regUser', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->boolean('isLocked');
                        $table->foreign('id')->references('id')->on('user');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('regUser');
	}

}
