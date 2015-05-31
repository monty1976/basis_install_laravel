<?php namespace App\Child;

use Illuminate\Database\Eloquent\Model;

class Child extends Model {

    //A child belongs to an image
    function image(){
        return $this->belongsTo('App\Image\Image');
    }

    function nursery(){
        return $this->belongsTo('App\Nursery\Nursery');
    }
    
    public function post(){
        return $this->belongsTo('App\Post\Post');
    }

    public function sleep(){
        return $this->belongsToMany('App\Sleep\Sleep');
    }
    
    public function users(){
        return $this->belongsToMany('App\User\User');
    }
}
