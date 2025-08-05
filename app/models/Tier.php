<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Tier extends Eloquent {

    
    protected $table = 'tiers';


    //Validation Rules and Validator Function
    public static $rules = array(

        'level'     =>'required'

        );

    public static function validator($input){
        return Validator::make($input,static::$rules);
    }

    // Relation
    public function distributors(){return $this->hasMany('Distributor','tier_id');}
    

    


}