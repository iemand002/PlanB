<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	protected $table = 'projecten';
	public $timestamps = true;

	public function gebruikers()
	{
		return $this->belongsToMany('App\Gebruiker', 'gevolgde_projecten');
	}

	public function milestones()
	{
		return $this->hasMany('App\Milestone');
	}

}