<?php

class ExportTypeController extends BaseController {


	public function index()
	{

		$export_types = ExportType::all();

		return View::make('export_types.index')
		->with('export_types',$export_types);

	}
	
	//------------------------------------------------------------------------------------------------- [ Create]

	
	public function create()
	{

		return View::make('export_types.create');
	}

	//------------------------------------------------------------------------------------------------- [ Store ]

	
	public function store()
	{
		$validator = ExportType::validator(Input::all());

		if ($validator->fails()) {
			return Redirect::to('export_types/create')
			->withErrors($validator)->withInput();

		} else {

			$export_type                = new ExportType;
			$export_type->name = Input::get('name');
			

			$export_type->save();
			return Redirect::to('/export_types')
			->with('success','The export_type was created succesfully!');

		}
	}
	
	//------------------------------------------------------------------------------------------------- [ Show ]


	public function show($id)
	{

		$export_type = ExportType::findOrFail($id);

		return View::make('export_types.show')
		->with('export_type', ExportType::find($id));
	}
	
	//------------------------------------------------------------------------------------------------- [ Edit ]


	public function edit($id)
	{

		$export_type = ExportType::findOrFail($id);

		return View::make('export_types.edit')
		->with('export_type', ExportType::find($id));
	}

	//------------------------------------------------------------------------------------------------- [ Update ]

	
	public function update($id)
	{
		$validation = ExportType::validator(Input::all());

		if ($validation->fails()) {
			
			return Redirect::to('export_types/'. $id . '/edit')->withErrors($validation)->withInput();

		} else {
			

			$export_type = ExportType::findOrFail($id);
			$export_type->name = Input::get('name');
	
			$export_type->save();


			return Redirect::to('export_types')
			->with('success','The export_type was updated succesfully!');
		}
	}
	//------------------------------------------------------------------------------------------------- [ Destroy ]

	public function destroy($id){
	
		$export_type = ExportType::find($id);

		$export_type->delete();

		return Redirect::to('export_types')
		->with('success','The export_type was deleted succesfully!');

	}
	
}
