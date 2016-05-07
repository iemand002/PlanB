<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('voornaam','name');
            $table->renameColumn('familienaam','surname');
            $table->renameColumn('wachtwoord','password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name','voornaam');
            $table->renameColumn('surname','familienaam');
            $table->renameColumn('password','wachtwoord');
        });
    }
}
