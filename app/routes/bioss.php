<?php 

// Bioss Route Restriction 
if(Auth::check()){
    if ( Auth::user()->type == "Bioss" ){

        Route::get('files/logo_path/{id}', function($id)
        {
            $logo_path = app_path() . '/files/logo_path/' . User::find($id)->logo_path;
            return Response::download($logo_path);
        });

        Route::get('files/thumbnail_path/{id}', function($id)
        {
            $thumbnail_path = app_path() . '/files/logo_path/' . Distributor::find($id)->thumbnail_path;
            return Response::download($thumbnail_path);
        });

        //Users
        Route::get('users','UserController@index');
        Route::get('users/{id}', array('before' =>'profile', 'uses'=>'UserController@show'));
        

        //Distributors
        Route::get('distributors','DistributorController@index');
        Route::get('distributors/disabled','DistributorController@disabled');
        Route::get('distributors/list_view','DistributorController@list_view');
        Route::get('distributors/{id}', array('before' =>'profile', 'uses'=>'DistributorController@show'));
        // Route::get('distributors/{id}/edit', 'DistributorController@edit');
        // Route::put('distributors/{id}/update', array('as'=>'distributors.update', 'uses'=>'DistributorController@update'));

        Route::get('/product_suggestions', array('uses' => 'API_InventoryController@suggestion' ,'as'=>'product_suggestions') );


        //Marketing Materials 
        Route::get('marketing_materials','MarketingMaterialController@index');
        Route::get('marketing_materials/{id}', array('before' =>'profile', 'uses'=>'MarketingMaterialController@show'));
        Route::get('marketing_materials/{id}/edit', 'MarketingMaterialController@edit');
        Route::put('marketing_materials/{id}/update', array('as'=>'marketing_materials.update', 'uses'=>'MarketingMaterialController@update'));

        Route::get('marketing_materials/{id}/download/thumb_path','MarketingMaterialController@thumb_download');
        Route::get('marketing_materials/{id}/download/media_path','MarketingMaterialController@media_download');


        //Catalog Downloads 
        Route::get('catalog_downloads','CatalogDownloadController@index');
        Route::get('catalog_downloads/{id}', array('before' =>'profile', 'uses'=>'CatalogDownloadController@show'));
        Route::get('catalog_downloads/{catalog_id}/download/{export_type_id}','CatalogDownloadController@file_download_internal');


        // Product Inventories
        Route::get('/product_inventory', array('uses' => 'API_InventoryController@index'), function(){
            return View::make('product_inventory.index');
        });

    }
}else{
    if (Auth::check())
        return View::make('errors.404_auth');
    else
        return View::make('errors.404');
}

?>