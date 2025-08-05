<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class MarketingMaterial extends Eloquent {

    
    protected $table = 'marketing_materials';



    //Validation Rules and Validator Function
    public static function validator($input, $id = ''){
        
        $rules = array(


        'title'       =>'required|max:45|unique:marketing_materials,title,'.$id,
        'description' =>'required|max:65535',
        'media_path'  =>'required',
        'thumb_path'  =>'required'
       
        
        );

        return Validator::make($input,$rules);
    }

    public static function validator_edit($input, $id = ''){
        
        $rules = array(


        'title'       =>'required|max:45|unique:marketing_materials,title,'.$id,
        'description' =>'required|max:65535'
       
       
        
        );

        return Validator::make($input,$rules);
    }




    // -< Obj = belongsTo 
    public function user(){return $this->belongsTo('User');}
    public function marketing_materials_category(){return $this->belongsTo('MarketingMaterialCategory');}
    

    


}