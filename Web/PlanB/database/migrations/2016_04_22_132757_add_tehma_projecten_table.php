<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTehmaProjectenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projecten', function (Blueprint $table) {
            $table->integer('thema_id')->unsigned();
            $table->foreign('thema_id')->references('id')->on('themas')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projecten', function (Blueprint $table) {
            $table->dropForeign('projecten_thema_id_foreign');
            $table->dropColumn('thema_id');
        });
    }
}
