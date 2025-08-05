<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ExportType extends Eloquent {

	
	protected $table = 'export_types';


	#_____Validation Rules and Validator Function ______#
	public static $rules = array(

		'name'     =>'required|max:45'

		);

	public static function validator($input){
		return Validator::make($input,static::$rules);
	}

	
	//1:M | One-to-Many
	public function distributors(){return $this->hasMany('Distributor','export_type_id');}
	public function product_exports(){return $this->hasMany('ProductExport','export_type_id');}

	


}