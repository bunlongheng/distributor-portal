<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Download extends Eloquent {


    protected $table = 'downloads';


    // Relations
    public function user(){return $this->belongsTo('User','user_id');}
    public function catalog_downloads(){return $this->hasMany('CatalogDownload'); }
    public function marketing_materials(){return $this->hasMany('Download'); }


}