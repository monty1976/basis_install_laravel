<?php namespace App\Activity;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {

    public function nurseries(){
        return $this->belongsTo('App\Nursery\Nursery');
    }

}
