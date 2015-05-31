<?php namespace App\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    /**
	 * The database table used by the model.
	 *  
	 * @var string
	 */
	protected $table = 'posts';
        
        /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
        protected $fillable = ['date', 'headline', 'content', 'nursery_id'];
        
        //Post belongs to a nursery
        public function nursery(){
            return $this->belongsTo('App\Nursery\Nursery');
        }

        public function images(){
            return $this->belongsToMany('App\Image\Image');
        }


}
