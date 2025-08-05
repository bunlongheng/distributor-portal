<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Permission extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $table = 'permissions';

	

	//Validation Rules and Validator Function 
	public static $rules = array(
		'name'     =>'required|min:2',
		);

	public static function validator($input){
		return Validator::make($input,static::$rules);
	}



	//Relation

	// Inverse Relation between users and roles 
	public function roles(){
		return $this->belongsToMany('Role');
	}





}