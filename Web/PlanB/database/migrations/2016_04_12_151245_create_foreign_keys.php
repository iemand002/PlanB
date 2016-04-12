<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('milestones', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('projecten')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('milestones', function(Blueprint $table) {
			$table->foreign('thema_id')->references('id')->on('themas')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('vragen', function(Blueprint $table) {
			$table->foreign('milestone_id')->references('id')->on('milestones')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('antwoorden', function(Blueprint $table) {
			$table->foreign('vraag_id')->references('id')->on('vragen')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('gevolgde_projecten', function(Blueprint $table) {
			$table->foreign('gebruiker_id')->references('id')->on('gebruikers')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('gevolgde_projecten', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('projecten')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('milestones', function(Blueprint $table) {
			$table->dropForeign('milestones_project_id_foreign');
		});
		Schema::table('milestones', function(Blueprint $table) {
			$table->dropForeign('milestones_thema_id_foreign');
		});
		Schema::table('vragen', function(Blueprint $table) {
			$table->dropForeign('vragen_milestone_id_foreign');
		});
		Schema::table('antwoorden', function(Blueprint $table) {
			$table->dropForeign('antwoorden_vraag_id_foreign');
		});
		Schema::table('gevolgde_projecten', function(Blueprint $table) {
			$table->dropForeign('gevolgde_projecten_gebruiker_id_foreign');
		});
		Schema::table('gevolgde_projecten', function(Blueprint $table) {
			$table->dropForeign('gevolgde_projecten_project_id_foreign');
		});
	}
}