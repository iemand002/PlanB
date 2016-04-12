<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model {

	protected $table = 'milestones';
	public $timestamps = true;

	public function thema()
	{
		return $this->hasOne('App\Thema');
	}

	public function project()
	{
		return $this->belongsTo('App\Project');
	}

	public function vragen()
	{
		return $this->hasMany('App\Vraag');
	}

}