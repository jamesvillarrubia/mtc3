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
			$table->integer('creatorID')->index()->default(0)->unsigned();
			$table->timestamps();
			$table->text('rawtext');
			$table->text('tagtext');
			$table->text('cleantext');
			$table->text('wikiword');
			$table->text('img_caption');
			$table->text('img_credit');
			$table->text('img_path');
			$table->integer('grade_min');
			$table->integer('grade_max');
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
