<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectenTable extends Migration {

	public function up()
	{
		Schema::create('projecten', function(Blueprint $table) {
			$table->increments('id');
			$table->string('naam');
			$table->timestamp('publish_till');
			$table->timestamp('publish_from');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('projecten');
	}
}