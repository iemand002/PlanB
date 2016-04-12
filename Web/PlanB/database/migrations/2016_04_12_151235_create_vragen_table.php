<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVragenTable extends Migration {

	public function up()
	{
		Schema::create('vragen', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('milestone_id')->unsigned();
			$table->string('vraag');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('vragen');
	}
}