<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sentences', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('content', 300);
            $table->integer('positive_votes')->unsgined()->default(0);
            $table->integer('negative_votes')->unsgined()->default(0);
			$table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sentences');
	}

}
