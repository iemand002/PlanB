<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveGeslachtEnumGebruikersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gebruikers', function (Blueprint $table) {
            $table->dropColumn('geslacht');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gebruikers', function (Blueprint $table) {
            $table->enum('geslacht',['man','vrouw'])->after('familienaam');
        });
    }
}
