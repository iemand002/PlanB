<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGevolgdeProjectenTable extends Migration {

	public function up()
	{
		Schema::create('gevolgde_projecten', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('gebruiker_id')->unsigned();
			$table->integer('project_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('gevolgde_projecten');
	}
}