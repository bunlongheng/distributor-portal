<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| More routes are in app/routes.
|
*/



Route::get('/', array('as' =>'home','uses'=>'HomeController@home'));
Route::get('shopify/distributors', array('as' => 'shopify.distributors', 'uses' => 'API_DistributorController@new_index'));

include 'routes/general.php';
include 'routes/account.php';
include 'routes/admin.php';
include 'routes/bioss.php';
include 'routes/distributor.php';
include 'routes/oem.php';
include 'routes/mkp.php';
//include 'routes/dev.php';


// API Routes
Route::group(array('prefix' => 'api'), function(){

    Route::get('distributor', array('before' => 'api', 'uses' => 'API_DistributorController@index'));
    Route::get('distributor/shopify', array('before' => 'api', 'uses' => 'API_DistributorController@index_new'));
    Route::post('inventory', array('before' => 'api', 'uses' => 'API_InventoryController@post'));

});





