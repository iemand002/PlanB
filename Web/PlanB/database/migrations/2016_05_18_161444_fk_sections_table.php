<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sections', function(Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
        Schema::table('sections', function(Blueprint $table) {
            $table->foreign('milestone_id')->references('id')->on('milestones')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_type_id_foreign');
        });
        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_milestone_id_foreign');
        });
    }
}
