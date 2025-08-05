<?php

// Admin Route Restriction 
if(Auth::check()){
    if ( Auth::user()->type == "Admin"){


        //General
        Route::get('/summary', array('as' =>'summary','uses'=>'HomeController@summary'));


        for ($t=1; $t<=10; $t++) { 
            Route::get('/test/'.$t, array('as' =>'t'.$t,'uses'=>'HomeController@test'.$t));
        }


        Route::get('files/logo_path/{id}', function($id)
        {
            $logo_path = app_path() . '/files/logo_path/' . Distributor::find($id)->logo_path;
            return Response::download($logo_path);
        });

        Route::get('files/thumbnail_path/{id}', function($id)
        {
            $thumbnail_path = app_path() . '/files/logo_path/' . Distributor::find($id)->thumbnail_path;
            return Response::download($thumbnail_path);
        });


        #____________________________________________________________________________________________________________________________________

                //Users
        Route::get('users','UserController@index');
        Route::get('users/create', array('as'=>'users.create', 'uses'=>'UserController@create'));
        Route::post('users/store','UserController@store');
        Route::get('users/{id}', array('before' =>'profile', 'uses'=>'UserController@show'));
        Route::get('users/{id}/send_invitation', array('before' =>'profile', 'uses'=>'UserController@invite')); 
        Route::get('users/{id}/edit', 'UserController@edit');
        Route::put('users/{id}/update', array('as'=>'users.update', 'uses'=>'UserController@update'));
        Route::delete('users/{id}/destroy',array('as'=>'users.destroy', 'uses'=>'UserController@destroy'));

                #____________________________________________________________________________________________________________________________________

                //Distributors
        Route::get('distributors','DistributorController@index');
        Route::get('distributors/disabled','DistributorController@disabled');
        Route::get('distributors/list_view','DistributorController@list_view');
        Route::get('distributors/create', array('as'=>'distributors.create', 'uses'=>'DistributorController@create'));
        Route::post('distributors/store','DistributorController@store');
        Route::get('distributors/{id}', array('before' =>'profile', 'uses'=>'DistributorController@show'));
        Route::get('distributors/{id}/send_invitation', array('before' =>'profile', 'uses'=>'DistributorController@invite'));     
        Route::get('distributors/{id}/edit', 'DistributorController@edit');
        Route::put('distributors/{id}/update', array('as'=>'distributors.update', 'uses'=>'DistributorController@update'));
        Route::delete('distributors/{id}/destroy',array('as'=>'distributors.destroy', 'uses'=>'DistributorController@destroy'));

        Route::get('/product_suggestions', array('uses' => 'API_InventoryController@suggestion' ,'as'=>'product_suggestions') );

                #___________________________________________________________________________________________________________________________________

                //Export Types 
        Route::get('export_types','ExportTypeController@index');
        Route::get('export_types/create', array('as'=>'export_types.create', 'uses'=>'ExportTypeController@create'));
        Route::post('export_types/store','ExportTypeController@store');
        Route::get('export_types/{id}', array('before' =>'profile', 'uses'=>'ExportTypeController@show'));
        Route::get('export_types/{id}/edit', 'ExportTypeController@edit');
        Route::put('export_types/{id}/update', array('as'=>'export_types.update', 'uses'=>'ExportTypeController@update'));
        Route::delete('export_types/{id}/destroy',array('as'=>'export_types.destroy', 'uses'=>'ExportTypeController@destroy'));

                #___________________________________________________________________________________________________________________________________

                //Tiers
        Route::get('tiers','TierController@index');
        Route::get('tiers/create', array('as'=>'tiers.create', 'uses'=>'TierController@create'));
        Route::post('tiers/store','TierController@store');
        Route::get('tiers/{id}', array('before' =>'profile', 'uses'=>'TierController@show'));
        Route::get('tiers/{id}/edit', 'TierController@edit');
        Route::put('tiers/{id}/update', array('as'=>'tiers.update', 'uses'=>'TierController@update'));
        Route::delete('tiers/{id}/destroy',array('as'=>'tiers.destroy', 'uses'=>'TierController@destroy'));

                 #___________________________________________________________________________________________________________________________________

                //Countries
        Route::get('countries','CountryController@index');
        Route::get('countries/create', array('as'=>'countries.create', 'uses'=>'CountryController@create'));
        Route::post('countries/store','CountryController@store');
        Route::get('countries/{id}', array('before' =>'profile', 'uses'=>'CountryController@show'));
        Route::get('countries/{id}/edit', 'CountryController@edit');
        Route::put('countries/{id}/update', array('as'=>'countries.update', 'uses'=>'CountryController@update'));
        Route::delete('countries/{id}/destroy',array('as'=>'countries.destroy', 'uses'=>'CountryController@destroy'));

                #___________________________________________________________________________________________________________________________________

                //Continents
        Route::get('continents','ContinentController@index');
        Route::get('continents/create', array('as'=>'continents.create', 'uses'=>'ContinentController@create'));
        Route::post('continents/store','ContinentController@store');
        Route::get('continents/{id}', array('before' =>'profile', 'uses'=>'ContinentController@show'));
        Route::get('continents/{id}/edit', 'ContinentController@edit');
        Route::put('continents/{id}/update', array('as'=>'continents.update', 'uses'=>'ContinentController@update'));
        Route::delete('continents/{id}/destroy',array('as'=>'continents.destroy', 'uses'=>'ContinentController@destroy'));

        #___________________________________________________________________________________________________________________________________

                //Export Frequencies
        Route::get('export_frequencies','ExportFrequencyController@index');
        Route::get('export_frequencies/create', array('as'=>'export_frequencies.create', 'uses'=>'ExportFrequencyController@create'));
        Route::post('export_frequencies/store','ExportFrequencyController@store');
        Route::get('export_frequencies/{id}', array('before' =>'profile', 'uses'=>'ExportFrequencyController@show'));
        Route::get('export_frequencies/{id}/edit', 'ExportFrequencyController@edit');
        Route::put('export_frequencies/{id}/update', array('as'=>'export_frequencies.update', 'uses'=>'ExportFrequencyController@update'));
        Route::delete('export_frequencies/{id}/destroy',array('as'=>'export_frequencies.destroy', 'uses'=>'ExportFrequencyController@destroy'));


                #____________________________________________________________________________________________________________________________________
      
                //Marketing Materials 
        Route::get('marketing_materials','MarketingMaterialController@index');
        Route::get('marketing_materials/create', array('as'=>'marketing_materials.create', 'uses'=>'MarketingMaterialController@create'));
        Route::post('marketing_materials/store','MarketingMaterialController@store');
        Route::get('marketing_materials/{id}', array('before' =>'profile', 'uses'=>'MarketingMaterialController@show'));
        Route::get('marketing_materials/{id}/edit', 'MarketingMaterialController@edit');
        Route::put('marketing_materials/{id}/update', array('as'=>'marketing_materials.update', 'uses'=>'MarketingMaterialController@update'));
        Route::delete('marketing_materials/{id}/destroy',array('as'=>'marketing_materials.destroy', 'uses'=>'MarketingMaterialController@destroy'));

        Route::get('marketing_materials/{id}/download/thumb_path','MarketingMaterialController@thumb_download');
        Route::get('marketing_materials/{id}/download/media_path','MarketingMaterialController@media_download');

                #____________________________________________________________________________________________________________________________________

                //Marketing Materials Category 
        Route::get('marketing_material_categories','MarketingMaterialCategoryController@index');
        Route::get('marketing_material_categories/create', array('as'=>'marketing_material_categories.create', 'uses'=>'MarketingMaterialCategoryController@create'));
        Route::post('marketing_material_categories/store','MarketingMaterialCategoryController@store');
        Route::get('marketing_material_categories/{id}', array('before' =>'profile', 'uses'=>'MarketingMaterialCategoryController@show'));
        Route::get('marketing_material_categories/{id}/edit', 'MarketingMaterialCategoryController@edit');
        Route::put('marketing_material_categories/{id}/update', array('as'=>'marketing_material_categories.update', 'uses'=>'MarketingMaterialCategoryController@update'));
        Route::delete('marketing_material_categories/{id}/destroy',array('as'=>'marketing_material_categories.destroy', 'uses'=>'MarketingMaterialCategoryController@destroy'));

                #____________________________________________________________________________________________________________________________________

                //Catalog Downloads 
        Route::get('catalog_downloads','CatalogDownloadController@index');
        Route::get('catalog_downloads/create', array('as'=>'catalog_downloads.create', 'uses'=>'CatalogDownloadController@create'));
        Route::post('catalog_downloads/store','CatalogDownloadController@store');
        Route::get('catalog_downloads/{id}', array('before' =>'profile', 'uses'=>'CatalogDownloadController@show'));
        Route::get('catalog_downloads/{id}/edit', 'CatalogDownloadController@edit');
        Route::put('catalog_downloads/{id}/update', array('as'=>'catalog_downloads.update', 'uses'=>'CatalogDownloadController@update'));
        Route::delete('catalog_downloads/{id}/destroy',array('as'=>'catalog_downloads.destroy', 'uses'=>'CatalogDownloadController@destroy'));

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