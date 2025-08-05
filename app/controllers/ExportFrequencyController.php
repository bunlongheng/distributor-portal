<?php

class ExportFrequencyController extends BaseController {


    public function index()
    {

        $export_frequencies = ExportFrequency::all();
        return View::make('export_frequencies.index')
        ->with('export_frequencies',$export_frequencies);

    }
    
    //------------------------------------------------------------------------------------------------- [ Create]

    
    public function create()
    {

        return View::make('export_frequencies.create');
    }

    //------------------------------------------------------------------------------------------------- [ Store ]

    
    public function store()
    {
        $validator = ExportFrequency::validator(Input::all());

        if ($validator->fails()) {
            return Redirect::to('export_frequencies/create')
            ->withErrors($validator)->withInput();

        } else {

            $export_frequency                = new ExportFrequency;
            $export_frequency->name = Input::get('name');
            $export_frequency->save();
            return Redirect::to('/export_frequencies')
            ->with('success','The export_frequency was created succesfully!');

        }
    }
    
    //------------------------------------------------------------------------------------------------- [ Show ]


    public function show($id)
    {

        $export_frequency = ExportFrequency::findOrFail($id);

        return View::make('export_frequencies.show')
        ->with('export_frequency', $export_frequency);
    }
    
    //------------------------------------------------------------------------------------------------- [ Edit ]


    public function edit($id)
    {

        $export_frequency = ExportFrequency::findOrFail($id);

        return View::make('export_frequencies.edit')
        ->with('export_frequency', $export_frequency);
    }

    //------------------------------------------------------------------------------------------------- [ Update ]

    
    public function update($id)
    {
        $validation = ExportFrequency::validator(Input::all());

        if ($validation->fails()) {
            
            return Redirect::to('export_frequencies/'. $id . '/edit')->withErrors($validation)->withInput();

        } else {
            

            $export_frequency = ExportFrequency::findOrFail($id);
            $export_frequency->name = Input::get('name');
            $export_frequency->save();


            return Redirect::to('export_frequencies')
            ->with('success','The export_frequency was updated succesfully!');
        }
    }
    //------------------------------------------------------------------------------------------------- [ Destroy ]

    public function destroy($id){
    
        $export_frequency = ExportFrequency::find($id);
        $export_frequency->delete();

        return Redirect::to('export_frequencies')
        ->with('success','The export_frequency was deleted succesfully!');

    }
    
}
