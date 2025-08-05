<?php

class ContinentController extends BaseController {


    public function index()
    {

        $continents = Continent::all();

        return View::make('continents.index')
        ->with('continents',$continents);

    }
    
    //------------------------------------------------------------------------------------------------- [ Create]

    
    public function create()
    {

        return View::make('continents.create');
    }

    //------------------------------------------------------------------------------------------------- [ Store ]

    
    public function store()
    {
        $validator = Continent::validator(Input::all());

        if ($validator->fails()) {
            return Redirect::to('continents/create')
            ->withErrors($validator);

        } else {

            $continent                = new Continent;

            $continent->name = Input::get('name');
            $continent->weight = Input::get('weight');
          
            
            

            $continent->save();
            return Redirect::to('/continents')
            ->with('success','The continent was created succesfully!');

        }
    }
    
    //------------------------------------------------------------------------------------------------- [ Show ]


    public function show($id)
    {

        $continent = Continent::findOrFail($id);

        return View::make('continents.show')
        ->with('continent', Continent::find($id));
    }
    
    //------------------------------------------------------------------------------------------------- [ Edit ]


    public function edit($id)
    {

        $continent = Continent::findOrFail($id);

        return View::make('continents.edit')
        ->with('continent', Continent::find($id));
    }

    //------------------------------------------------------------------------------------------------- [ Update ]

    
    public function update($id)
    {
        $validation = Continent::validator(Input::all());

        if ($validation->fails()) {
            
            return Redirect::to('continents/'. $id . '/edit')->withErrors($validation);

        } else {
            

            $continent = Continent::findOrFail($id);
            $continent->name = Input::get('name');
            $continent->weight = Input::get('weight');
            $continent->logo_path = Input::get('logo_path');
            

            $continent->save();


            return Redirect::to('continents')
            ->with('success','The continent was updated succesfully!');
        }
    }
    //------------------------------------------------------------------------------------------------- [ Destroy ]

    public function destroy($id){
        
        $continent = Continent::find($id);

        $continent->delete();

        return Redirect::to('continents')
        ->with('success','The continent was deleted succesfully!');

    }
    
}
