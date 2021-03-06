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

    protected $dates = ['publish_from', 'publish_till','publish_from_date_only'];
    protected $appends = ['publish_from_date_only'];

    protected $table = 'milestones';
    public $timestamps = true;


    public function setPublishFromAttribute($date)
    {
        return $this->attributes['publish_from'] = Carbon::createFromFormat('d/m/Y H:i:s', $date)->format('Y-m-d H:i:s');
    }

    public function getPublishFromAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }



    public function setPublishTillAttribute($date)
    {
//        dd(Carbon::createFromFormat('d/m/Y H:i:s', $date));
        return $this->attributes['publish_till'] = Carbon::createFromFormat('d/m/Y H:i:s', $date)->format('Y-m-d H:i:s');
    }

    public function getPublishTillAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }



    public function getPublishFromDateOnlyAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['publish_from'])->format('d/m/Y');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }

    public function scopePublished($query){
        $query->where('publish_from','<',Carbon::now());
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