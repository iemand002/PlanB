<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	protected $table = 'sections';
	public $timestamps = true;

	public function type()
	{
		return $this->belongsTo('App\Type');
	}

	public function milestone()
	{
		return $this->belongsTo('App\Milestone');
	}

}