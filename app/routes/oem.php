<?php 

// OEM Route Restriction 
if(Auth::check()){
    if ( (Auth::user()->type == "Distributor") AND (Auth::user()->distObj()->type == 'OEM') ){


        Route::post('/account/change-password',array('as'=>'account-change-password-post','uses'=>'AccountController@postChangePassword'));
        Route::get('/account/change-password',array('as'=>'account-change-password','uses'=>'AccountController@getChangePassword'));
        Route::get('/account/sign-out',array('as'=>'account-sign-out','uses'=>'AccountController@getSignOut' ));
        Route::get('/dashboard', array('as' =>'dashboard','uses'=>'HomeController@dashboard'));


        Route::get('distributors/{id}', array('uses'=>'DistributorController@show'));
        Route::get('distributors/{id}/edit', 'DistributorController@edit');
        Route::put('distributors/{id}/update', array('as'=>'distributors.update', 'uses'=>'DistributorController@update'));

        Route::get('catalog_downloads','CatalogDownloadController@index');
        Route::get('catalog_downloads/{id}/download','CatalogDownloadController@file_download');

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

    }
    
}else{
    if (Auth::check())
        return View::make('errors.404_auth');
    else
        return View::make('errors.404');
}

?>