<?php namespace App\Nursery;

use Illuminate\Database\Eloquent\Model;

class Nursery extends Model {

    protected $table = 'nurseries';

    public function activities(){
        return $this->hasMany('App\Activity\Activity');
    }
    
    public function posts(){
        return $this->hasMany('App\Post\Post');
    }

    public function nursery_type(){
        return $this->belongsTo('App\Nursery\NurseryType');
    }
    
    public function users(){
        return $this->belongsToMany('App\User\User', 'nursery_user');
    }
}
