<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class MarketingMaterialCategory extends Eloquent {

    
    protected $table = 'marketing_materials_categories';


   //Rules
    public static $rules = array(
        
        'name'       =>'required|max:45'
        
        );

    // Validator Function
    public static function validator($input){
        return Validator::make($input,static::$rules);
    }


    // Relation
    public function marketing_materials(){ return $this->hasMany('MarketingMaterial','marketing_materials_category_id');}


}