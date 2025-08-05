<?php

class CountryController extends BaseController {


    public function index()
    {

        $countries = Country::all();

        return View::make('countries.index')
        ->with('countries',$countries);

    }
    
    //------------------------------------------------------------------------------------------------- [ Create]

    
    public function create()
    {

        return View::make('countries.create');
    }

    //------------------------------------------------------------------------------------------------- [ Store ]

    
    public function store()
    {
        $validator = Country::validator(Input::all());

        if ($validator->fails()) {
            return Redirect::to('countries/create')
            ->withErrors($validator);

        } else {

            $country                = new Country;

            $country->name = Input::get('name');
            $country->code = Input::get('code');
            $country->logo = Input::get('logo');
            
            

            $country->save();
            return Redirect::to('/countries')
            ->with('success','The country was created succesfully!');

        }
    }
    
    //------------------------------------------------------------------------------------------------- [ Show ]


    public function show($id)
    {

        $country = Country::findOrFail($id);

        return View::make('countries.show')
        ->with('country', Country::find($id));
    }
    
    //------------------------------------------------------------------------------------------------- [ Edit ]


    public function edit($id)
    {

        $country = Country::findOrFail($id);

        return View::make('countries.edit')
        ->with('country', Country::find($id));
    }

    //------------------------------------------------------------------------------------------------- [ Update ]

    
    public function update($id)
    {
        $validation = Country::validator(Input::all());

        if ($validation->fails()) {
            
            return Redirect::to('countries/'. $id . '/edit')->withErrors($validation);

        } else {
            

            $country = Country::findOrFail($id);
            $country->name = Input::get('name');
            $country->code = Input::get('code');
            $country->weight = Input::get('weight');
            

            $country->save();


            return Redirect::to('countries')
            ->with('success','The country was updated succesfully!');
        }
    }
    //------------------------------------------------------------------------------------------------- [ Destroy ]

    public function destroy($id){
        
        $country = Country::find($id);

        $country->delete();

        return Redirect::to('countries')
        ->with('success','The country was deleted succesfully!');

    }
    
}
