<?php namespace App\Content;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {

	//
    public $timestamps = false;
    protected $table = 'contents';


    public function image(){
        return $this->belongsTo('App\Image\Image');
    }
}
