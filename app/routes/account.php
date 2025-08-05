<?php

#____________________________________________________________________________________________________________________________________
///////////////////////////
//Account Authentication //
///////////////////////////


//Sign In 
Route::post('/account/sign-in',array('as'=>'account-sign-in-post','uses'=>'AccountController@postSignIn'));
Route::get('/account/sign-in',array('as' =>'account-sign-in','uses'=>'AccountController@getSignIn'));

//SET Password 
Route::get('/account/set-password/{code}',array('as'=>'account-set-password','uses'=>'AccountController@getSetPassword'));
Route::post('/account/set-password',array('as'=>'account-set-password-post','uses'=>'AccountController@postSetPassword'));

//RESET Password 
Route::get('/account/reset-password/{code}',array('as'=>'account-reset-password','uses'=>'AccountController@getReSetPassword'));
Route::post('/account/reset-password',array('as'=>'account-reset-password-post','uses'=>'AccountController@postReSetPassword'));

//FORGOT Password 

Route::get('/account/forgot-password',array('as'=>'account-forgot-password','uses'=>'AccountController@getForgotPassword'));
Route::post('/account/forgot-password',array('as'=>'account-forgot-password-post','uses'=>'AccountController@postForgotPassword'));


?>