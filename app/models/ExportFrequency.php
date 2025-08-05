<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ExportFrequency extends Eloquent {

    
    protected $table = 'export_frequencies';


    #_____Validation Rules and Validator Function ______#
    public static $rules = array(

        'name'   =>'required|max:45',
        );

    public static function validator($input){
        return Validator::make($input,static::$rules);
    }

    
    public function distributors(){return $this->hasMany('Distributor','export_frequency_id');}


    public function catalog_downloads(){ 
        return $this->belongsToMany('CatalogDownload','export_frequency_catalog_download','catalog_download_id','export_frequency_id');
    }
    

}