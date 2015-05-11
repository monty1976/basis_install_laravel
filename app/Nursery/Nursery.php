<?php namespace App\Nursery;

use Illuminate\Database\Eloquent\Model;

class Nursery extends Model {

    protected $table = 'nurseries';

    public function activities(){
        return $this->hasMany('App\Activity\Activity');
    }
}
