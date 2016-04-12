<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGebruikersTable extends Migration {

	public function up()
	{
		Schema::create('gebruikers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('wachtwoord');
			$table->rememberToken();
			$table->boolean('admin')->default(false);
			$table->string('voornaam');
			$table->string('familienaam');
			$table->enum('geslacht', array('man', 'vrouw'));
			$table->date('geboortedatum');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('gebruikers');
	}
}