<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id');
			$table->text('tekst')->nullable();
			$table->string('url');
			$table->integer('type_id')->unsigned();
			$table->integer('milestone_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}