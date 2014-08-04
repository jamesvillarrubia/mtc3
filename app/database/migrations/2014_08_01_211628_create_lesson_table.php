<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons', function(Blueprint $table){
			$table->increments('id');
			$table->string('title',500);
			$table->string('format',50)->index();
			$table->string('levels',1000);
			$table->integer('creatorID')->index()->default(0)->unsigned();
			$table->timestamps();
			$table->string('description',1000);
			$table->text('rawtext');
			$table->text('tagtext');
			$table->text('cleantext');

		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lessons');
	}

}
