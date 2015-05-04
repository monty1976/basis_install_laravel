<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model {

	//

    //A child belogns to an image
    function image(){
        return $this->belongsTo('App\Image');
    }

    function nursery(){
        return $this->belongsTo('App\Nursery\Nursery');
    }

}
