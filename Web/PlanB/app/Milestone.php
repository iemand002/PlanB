<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'naam',
    ];

    protected $dates = ['publish_from', 'publish_till'];

    protected $table = 'milestones';
    public $timestamps = true;


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

    public function getPublishFromDateOnlyAttribute($date)
    {
        return $this->attributes['publish_from_date_only'] = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['publish_from'])->format('d/m/Y');
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

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function vragen()
    {
        return $this->hasMany('App\Vraag');
    }

    public function creator()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function sections()
    {
        return $this->hasMany('App\Section')->orderBy('position');
    }

}