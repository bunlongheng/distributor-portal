<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Address extends Eloquent {


    protected $table = 'addresses';

    public static function validator($input){
        
        $rules = array(
        
             'adline1_billing'  =>'required|max:255',
             'adline2_billing'  =>'max:45',
             'city_billing'     =>'max:45',
             'state_billing'    =>'max:45',
             'postcode_billing' =>'max:45',
             'country_billing'  =>'required',

             'adline1_hq'  =>'required|max:255',
             'adline2_hq'  =>'max:45',
             'city_hq'     =>'max:45',
             'state_hq'    =>'max:45',
             'postcode_hq' =>'max:45',
             'country_hq'  =>'required',
             
             'adline1_shipping'  =>'required|max:255',
             'adline2_shipping'  =>'max:45',
             'city_shipping'     =>'max:45',
             'state_shipping'    =>'max:45',
             'postcode_shipping' =>'max:45',
             'country_shipping'  =>'required'

            );

        $validator = Validator::make($input, $rules);
        return $validator;
    }

    // Relations
    public function distributor(){return $this->belongsTo('Distributor','distributor_id');}
    public function country(){return $this->belongsTo('Country','country_id');}

  
   
    



}