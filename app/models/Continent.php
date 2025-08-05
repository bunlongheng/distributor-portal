<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Continent extends Eloquent {

    
    protected $table = 'continents';


    //Validation Rules and Validator Function
    public static $rules = array(

        'name'   =>'required',
        'weight' =>'required'

        );

    public static function validator($input){
        return Validator::make($input,static::$rules);
    }

    // Relation
    public function distributors(){return $this->hasMany('Distributor','continent_id');}
    public function countries(){return $this->hasMany('Country','continent_id');}
    

    


}