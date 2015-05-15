<?php namespace App\User;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *  
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name','password','email','role_id','is_public','adress_id' ];




	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    //User belongs to a Role
    public function role(){
        return $this->belongsTo('App\Role');
    }

    //User has many children

    function children()
    {
        return $this->belongsToMany('App\Child\Child');
    }
    
    public function nursery()
    {
        return $this->belongsToMany('App\Nursery\Nursery');
    }
}
