<?php namespace App\Form;

use Illuminate\Database\Eloquent\Model;

class Form extends Model {
    
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = "forms";
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['description', 'date', 'time_start', 'time_end'];
   protected $guarded = ['child_id'];
           
   function child(){
       return $this->belongsTo('App\Child\Child');
   }
   
   function form_type(){
       return $this->belongsTo('App\Form\FormType');
   }

}
