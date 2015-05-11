<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Book', function(Blueprint $table)
		{	
			$table->integer('isbn')->unique();
			$table->primary('isbn');
			$table->string('file-name');	
			$table->integer('rating')->nullable();
			# The following are required
			$table->string('title');	
			$table->string('author');
			# These are not
			$table->integer('ean')->nullable();
			$table->integer('asin')->nullable();
			$table->date('publication-date')->nullable();
			$table->date('release-date')->nullable();
			$table->string('label')->nullable();
			$table->text('content');
			$table->string('language');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Book');
	}

}
