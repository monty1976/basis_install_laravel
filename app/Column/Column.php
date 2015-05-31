<?php namespace App\Column;

use Illuminate\Database\Eloquent\Model;

class Column extends Model {

	//
    public $timestamps = false;

    public function content(){
        return $this->belongsTo('App\Content\Content');
    }


    public function contentType(){
        return $this->belongsTo('App\ContentType\ContentType');
    }
}
