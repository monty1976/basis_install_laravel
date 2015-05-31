<?php namespace App\Section;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	//

    public $timestamps = false;
    protected $table = 'sections';

    public function columns(){
        return $this->hasMany('App\Column\Column');
    }
}
