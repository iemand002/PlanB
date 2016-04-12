<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antwoord extends Model {

	protected $table = 'antwoorden';
	public $timestamps = true;

	public function vraag()
	{
		return $this->belongsTo('App\Vraag');
	}

}