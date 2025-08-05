<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ProductUpload extends Eloquent {
	
	protected $table = 'product_uploads';

	// Rules
	public static function validator($input){

		$rules = array(
			'csv_file' => 'required|mimes:csv,xlsx'
		);

		$validator = Validator::make($input, $rules);

		return $validator;
	}
}