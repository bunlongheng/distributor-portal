<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Contact extends Eloquent {


    protected $table = 'contacts';


    // Rules
    public static function validator($input){
    
    if(Auth::user()->type == 'Bioss' OR Auth::user()->type == 'Admin' ) {    

        $rules = array(
        
            'firstname_main'    =>'required|max:45',
            'lastname_main'     =>'required|max:45',
            'phone_main'        =>'required|max:45',
            'email_main'        =>'required|max:255',
            'title_main'        =>'max:255',
            
            'firstname_sale'    =>'max:45',
            'lastname_sale'     =>'max:45',
            'phone_sale'        =>'max:45',
            'email_sale'        =>'max:255',
            'title_sale'        =>'max:255',
            
            'firstname_support' =>'max:45',
            'lastname_support'  =>'max:45',
            'phone_support'     =>'max:45',
            'email_support'     =>'max:255',
            'title_support'     =>'max:255'
           
            );

        }else {

            $rules = array(
        
            'firstname_main'    =>'required|max:45',
            'lastname_main'     =>'required|max:45',
            'phone_main'        =>'required|max:45',
            'email_main'        =>'required|max:255',
            'title_main'        =>'max:255',
            
            'firstname_sale'    =>'required|max:45',
            'lastname_sale'     =>'required|max:45',
            'phone_sale'        =>'required|max:45',
            'email_sale'        =>'required|max:255',
            'title_sale'        =>'max:255',
            
            'firstname_support' =>'required|max:45',
            'lastname_support'  =>'required|max:45',
            'phone_support'     =>'required|max:45',
            'email_support'     =>'required|max:255',
            'title_support'     =>'max:255'
           
            );
        }

        $validator = Validator::make($input, $rules);
        return $validator;
    }

    
    // Relations
    public function country(){return $this->belongsTo('Country','country_id');}
    public function distributor(){return $this->belongsTo('Distributor','distributor_id');}

  
   
    



}