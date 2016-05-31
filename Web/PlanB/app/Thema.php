<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Thema extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'naam',
    ];

	protected $table = 'themas';
	public $timestamps = true;

	public function projecten()
	{
		return $this->hasMany('App\Project');
	}

}