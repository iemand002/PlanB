<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Project extends Model implements SluggableInterface
{
	use SluggableTrait;

	protected $sluggable = [
		'build_from' => 'naam',
	];

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
	public function getPublishFromAttribute($date)
	{
		return $this->attributes['publish_from'] = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
	}

	public function getPublishTillAttribute($date)
	{
		return $this->attributes['publish_till'] = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
	}
	public function getCreatedAtAttribute($date)
	{
		return $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
	}

	public function getUpdatedAtAttribute($date)
	{
		return $this->attributes['updated_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
	}

	public function gebruikers()
	{
		return $this->belongsToMany('App\Gebruiker', 'gevolgde_projecten');
	}

	public function milestones()
	{
		return $this->hasMany('App\Milestone')->orderBy('id','desc');;
	}

	public function thema()
	{
		return $this->belongsTo('App\Thema');
	}

	public function creator()
	{
		return $this->belongsTo('App\User','user_id');
	}

}