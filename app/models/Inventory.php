<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Inventory extends Eloquent {


    protected $table = 'inventories';

    protected $fillable = array('sku', 'description', 'conjugation', 'price', 'stock');

    public static function validator($input){

        $rules = array(
        
             'id'          =>'max:10',
             'sku'         =>'max:255',
             'description' =>'max:255',
             'day_of_week' =>'max:2',
             'stock'       =>'max:5'

            );

        $validator = Validator::make($input, $rules);
        return $validator;
    }
}