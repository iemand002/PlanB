<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gebruiker extends Model {

	protected $table = 'gebruikers';
	public $timestamps = true;

	public function projecten()
	{
		return $this->belongsToMany('App\Project', 'gevolgde_projecten');
	}

}