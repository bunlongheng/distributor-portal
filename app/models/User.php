<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');
	

	//Timestamp Format
	public function getCreatedAtAttribute($date){return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');}
	public function getUpdatedAtAttribute($date){return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');}


	//Fillable Variable
	protected $fillable = array(
		'firstname',
		'lastname',
		'username',
		'email',
		'code',
		'active',
		'type',
		'logo_path'
		);


	//Validation Rules and Validator Function
	public static function validator($input, $id = ''){
		
		$rules = array(

		'firstname' =>'max:45',
		'lastname'  =>'max:45',
		'username'  =>'required|unique:users,username,'. $id .'|unique:users,email,'. $id .'',
		'email'     =>'required|email|unique:users,email,'. $id .'|unique:users,username,'. $id .'',
		'logo_path' =>'max:255'
		
		);
		return Validator::make($input,$rules);
	}

	

	//Relation
	public function roles(){return $this->belongsToMany('Role','users_roles','user_id','role_id');}
	public function distributor(){return $this->hasOne('DistUser','user_id'); }
	public function product_postings(){return $this->hasMany('ProductPosting','user_id'); }
	public function downloads(){return $this->hasMany('Download','user_id'); }
	public function logs(){return $this->hasMany('ActivityLog','user_id'); }


    function distObj () {
	    $distRel = DistUser::where('user_id', $this->id)->first();
	    if (!$distRel) return null;
	    $dist = Distributor::findOrFail($distRel->distributor_id);
	    return $dist;
    }


}