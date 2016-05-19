<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypesTable extends Migration {

	public function up()
	{
		Schema::create('types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('naam');
		});
	}

	public function down()
	{
		Schema::drop('types');
	}
}