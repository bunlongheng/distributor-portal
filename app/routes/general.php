<?php

Route::group(array('before'=>'auth'),function() {

        //Change Password
        Route::post('/account/change-password',array('as'=>'account-change-password-post','uses'=>'AccountController@postChangePassword'));
        Route::get('/account/change-password',array('as'=>'account-change-password','uses'=>'AccountController@getChangePassword'));


        //Sign Out
        Route::get('/account/sign-out',array('as'=>'account-sign-out','uses'=>'AccountController@getSignOut' ));
        
        //Dashboard
        Route::get('/dashboard', array('as' =>'dashboard','uses'=>'HomeController@dashboard'));

        //Comingsoon
        Route::get('/comingsoon', array('as' =>'comingsoon','uses'=>'HomeController@comingsoon'));
        Route::get('/comingsoon/gift', array('as' =>'comingsoon','uses'=>'HomeController@comingsoon_gift'));
        Route::get('/comingsoon/newsletter-archive', array('as' =>'comingsoon','uses'=>'HomeController@comingsoon_newsletter'));
        Route::get('/comingsoon/marketing_material', array('as' =>'comingsoon','uses'=>'HomeController@comingsoon_marketing_material'));


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

}); 

?>