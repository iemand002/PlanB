<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	protected $table = 'projecten';
	public $timestamps = true;
	protected $dates=['publish_from','publish_till'];

	public function setPublishFromAttribute($date)
	{
		return $this->attributes['publish_from'] = Carbon::createFromFormat('d/m/Y H:i:s', $date)->format('Y-m-d H:i:s');
	}

	public function setPublishTillAttribute($date)
	{
		return $this->attributes['publish_till'] = Carbon::createFromFormat('d/m/Y H:i:s', $date)->format('Y-m-d H:i:s');
	}

	public function gebruikers()
	{
		return $this->belongsToMany('App\Gebruiker', 'gevolgde_projecten');
	}

	public function milestones()
	{
		return $this->hasMany('App\Milestone');
	}

}