<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Country extends Eloquent {

    
    protected $table = 'countries';


    #_____Validation Rules and Validator Function ______#
    public static $rules = array(

        'name' =>'required',
        'code' =>'required'

        );

    public static function validator($input){
        return Validator::make($input,static::$rules);
    }

    
    public function distributors(){return $this->hasMany('Distributor','country_id');}
    public function contacts(){return $this->belongsTo('Contact','country_id');}
    public function continent(){return $this->belongsTo('Continent','continent_id');}
    

    


}