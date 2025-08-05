<?php

class TierController extends BaseController {


    public function index()
    {

        $tiers = Tier::all();

        return View::make('tiers.index')
        ->with('tiers',$tiers);

    }
    
    //------------------------------------------------------------------------------------------------- [ Create]

    
    public function create()
    {

        return View::make('tiers.create');
    }

    //------------------------------------------------------------------------------------------------- [ Store ]

    
    public function store()
    {
        $validator = Tier::validator(Input::all());

        if ($validator->fails()) {
            return Redirect::to('tiers/create')
            ->withErrors($validator);

        } else {

            $tier                = new Tier;

            $tier->level = Input::get('level');
          
            

            $tier->save();
            return Redirect::to('/tiers')
            ->with('success','The tier was created succesfully!');

        }
    }
    
    //------------------------------------------------------------------------------------------------- [ Show ]


    public function show($id)
    {

        $tier = Tier::findOrFail($id);

        return View::make('tiers.show')
        ->with('tier', Tier::find($id));
    }
    
    //------------------------------------------------------------------------------------------------- [ Edit ]


    public function edit($id)
    {

        $tier = Tier::findOrFail($id);

        return View::make('tiers.edit')
        ->with('tier', Tier::find($id));
    }

    //------------------------------------------------------------------------------------------------- [ Update ]

    
    public function update($id)
    {
        $validation = Tier::validator(Input::all());

        if ($validation->fails()) {
            
            return Redirect::to('tiers/'. $id . '/edit')->withErrors($validation);

        } else {
            

            $tier = Tier::findOrFail($id);
            $tier->level = Input::get('level');
            

            $tier->save();


            return Redirect::to('tiers')
            ->with('success','The tier was updated succesfully!');
        }
    }
    //------------------------------------------------------------------------------------------------- [ Destroy ]

    public function destroy($id){
    
        $tier = Tier::find($id);

        $tier->delete();

        return Redirect::to('tiers')
        ->with('success','The tier was deleted succesfully!');

    }
    
}
