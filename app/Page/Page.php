<?php namespace App\Page;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {


    public $timestamps = false;
	//
    public function sections(){
        return $this->hasMany('App\Section\Section');
    }
}
