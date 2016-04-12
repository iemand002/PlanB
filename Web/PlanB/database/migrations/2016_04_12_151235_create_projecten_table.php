<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectenTable extends Migration {

	public function up()
	{
		Schema::create('projecten', function(Blueprint $table) {
			$table->increments('id');
			$table->string('naam');
			$table->datetime('publish_till');
			$table->datetime('publish_from');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('projecten');
	}
}