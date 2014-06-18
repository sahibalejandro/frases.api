<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentenceTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sentence_tag', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->integer('sentence_id')->unsigned();

            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sentence_id')
                ->references('id')->on('sentences')
                ->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sentence_tag');
	}

}
