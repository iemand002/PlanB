<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'admin' => 'boolean',
    ];

    public function getFullnameAttribute(){
        return $this->name.' '.$this->surname;
    }
    
    public function projecten()
    {
        return $this->belongsToMany('App\Project', 'gevolgde_projecten');
    }

    public function projectEigendom()
    {
        return $this->belongsToMany('App\Project');
    }

    public function milestoneEigendom()
    {
        return $this->belongsToMany('App\Milestone');
    }
}
