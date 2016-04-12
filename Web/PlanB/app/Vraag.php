<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vraag extends Model {

	protected $table = 'vragen';
	public $timestamps = true;

	public function milestone()
	{
		return $this->belongsTo('App\Milestone');
	}

	public function antwoorden()
	{
		return $this->hasMany('App\Antwoord');
	}

}