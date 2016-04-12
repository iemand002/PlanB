<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateThemasTable extends Migration {

	public function up()
	{
		Schema::create('themas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('naam');
			$table->text('beschrijving');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('themas');
	}
}