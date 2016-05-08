<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdVeldenBijProjectenEnMilestones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projecten', function (Blueprint $table) {
            $table->integer('user_id')->after('thema_id')->unsigned()->nullable();
        });
        Schema::table('milestones', function (Blueprint $table) {
            $table->integer('user_id')->after('project_id')->unsigned()->nullable();
        });
        Schema::table('milestones', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('set null')
                ->onUpdate('restrict');
        });
        Schema::table('projecten', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('set null')
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
        Schema::table('projecten', function(Blueprint $table) {
            $table->dropForeign('projecten_user_id_foreign');
        });
        Schema::table('milestones', function(Blueprint $table) {
            $table->dropForeign('milestones_user_id_foreign');
        });
        Schema::table('projecten', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('milestones', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
