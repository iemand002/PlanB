<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAntwoordenTable extends Migration {

	public function up()
	{
		Schema::create('antwoorden', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('vraag_id')->unsigned();
			$table->string('antwoord');
			$table->integer('aantal_gekozen');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('antwoorden');
	}
}