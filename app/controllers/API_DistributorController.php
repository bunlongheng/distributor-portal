<?php

class API_DistributorController extends \BaseController {

    // This function will control what to sent to http://biossusa.com/store/distributors as JSON
    public function index_new()
    {

        // dd(Distributor::all());
        $distributors = [];


        $q_distributors = Distributor::where('type','!=','OEM')
        ->where('type','!=','MKP')
        ->where('company_name','!=','BiossUSA')
        ->where('company_name','!=','Bioss')
        ->where('active','=',1)->get();
        /*        
        ->whereHas('user', function($q)
        {
            //$q->where('active', '=', 1);
        })->get();
        */

        foreach($q_distributors as $distributor) {

            $logo_path = 'https://d.biossusa.com/logo_path/'.$distributor->logo_path;
            $country_name = $distributor->country()->first()->name;

            // Contruct an array of object
            $distributors[$distributor->id] = [
            'country' => $country_name,
            'phone' => $distributor->phone_public,
            'email' => $distributor->email_public,
            'url' => $distributor->url,
            'company_logo' => $logo_path,
            'company_name' => $distributor->company_name,
           //'active' => $distributor->active,
           //'user_id' => $distributor->user_id

            ];

        }


        // dd($distributors);

        return $distributors;

        return Response::json($distributors);
    }

}
