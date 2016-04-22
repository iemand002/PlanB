<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model implements SluggableInterface
{
	use SluggableTrait;

	protected $sluggable = [
		'build_from' => 'naam',
	];

	protected $table = 'milestones';
	public $timestamps = true;

	public function thema()
	{
		return $this->belongsTo('App\Thema');
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