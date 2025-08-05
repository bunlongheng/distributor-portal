<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Distributor extends Eloquent {

	
	protected $table = 'distributors';

	public static function validator($input){

		
		if(Auth::user()->type == 'Bioss' OR Auth::user()->type == 'Admin' ) {

			$rules = array(

				'type'               =>'required',
				'country'            =>'required',
				'tier'               =>'required',
				'export_frequency'   =>'required',
				'discount_rate_info' =>'required',
				'export_type'        =>'required',
				'payment_method'     =>'required',
				'shipping_number'    =>'max:255',
				'start_date'         =>'date|required',
				'company_name'       =>'required|max:255',
				'url'                =>'max:255',
				'phone_public'       =>'max:255',
				'email_public'       =>'max:255',
				'sale_region'        =>'max:255',
				'activity_log'       =>'max:65535',
				'internal_note'      =>'max:65535'

				);

		}else {

			$rules = array(
				
					'country'            =>'required',
					'company_name'       =>'required|max:255',
					'payment_method'     =>'required',
					'shipping_number'    =>'max:255',
					'url'                =>'max:255'                   
				
				);



		}


		return Validator::make($input, $rules);
	}

	
	// Relation ________________________________________________________________________

	public function user(){ return $this->belongsTo('User'); }
	public function export_type(){ return $this->belongsTo('ExportType','export_type_id' );}
	public function gift(){ return  $this->belongsTo('Gift','gift_id' );}
	public function promotion(){ return  $this->belongsTo('Promotion','promotion_id' );}
	public function country(){ return $this->belongsTo('Country','country_id' );}
	public function tier(){ return $this->belongsTo('Tier','tier_id' );}
	public function export_frequency(){ return $this->belongsTo('ExportFrequency','export_frequency_id' );}
	
	
	public function contacts(){ return $this->hasMany('Contact'); }
	public function addresses(){ return $this->hasMany('Address'); }
	public function requests(){ return $this->hasMany('Request'); }








}