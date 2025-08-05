<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class CatalogDownload extends Eloquent {

	
	protected $table = 'catalog_downloads';


	// Rules
	public static function validator($input){

		$rules = array(
			'title'              =>'required|max:100',
			'export_frequencies' =>'required' ,
			'exported_date'      =>'date|required' 
			
			);

		foreach( ExportType::all() as $export_type) {

			$rules['type_'.$export_type->id] = 'required';
		}

		$validator = Validator::make($input, $rules);

		return $validator;
	}



	public static function edit_validator($input){
		

		$rules = array(
			'title'         =>'required|max:100'
			);

		$validator = Validator::make($input, $rules);
		return $validator;
	}

	// Relations

	public function product_exports(){ return $this->hasMany('ProductExport','catalog_download_id');}
	public function user(){return $this->belongsTo('User');}

	public function export_frequencies(){ 
		return $this->belongsToMany('ExportFrequency','export_frequency_catalog_download','catalog_download_id','export_frequency_id');
		
	}


}