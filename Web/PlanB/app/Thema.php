<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thema extends Model {

	protected $table = 'themas';
	public $timestamps = true;

	public function projecten()
	{
		return $this->hasMany('App\Project');
	}

}