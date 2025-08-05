<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ActivityLog extends Eloquent {


    protected $table = 'logs';

    // Relations
    public function user(){return $this->belongsTo('User','user_id');}
   

}