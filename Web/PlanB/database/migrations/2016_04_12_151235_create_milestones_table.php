<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMilestonesTable extends Migration {

	public function up()
	{
		Schema::create('milestones', function(Blueprint $table) {
			$table->increments('id');
			$table->string('naam');
			$table->string('locatie');
			$table->text('beschrijving');
			$table->string('afbeelding');
			$table->integer('likes')->default('0');
			$table->integer('dislikes')->default('0');
			$table->integer('milestone');
			$table->integer('project_id')->unsigned();
			$table->integer('thema_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('milestones');
	}
}