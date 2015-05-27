<?php namespace App\Activity;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {

    protected $table = 'activities';
    
    public function nurseries(){
        return $this->belongsTo('App\Nursery\Nursery');
    }

}
