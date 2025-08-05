<?php

class CatalogDownloadController extends BaseController {

	// Bring up index view of Catalog Download 
	public function index()
	{

		$catalog_downloads = CatalogDownload::with('export_frequencies')
			->with('product_exports')
			->orderBy('created_at', 'desc')
			->get();
		$export_types = ExportType::all();
				
		return View::make('catalog_downloads.index')
			->with('catalog_downloads', $catalog_downloads)
			->with('export_types', $export_types);
	}

	//-------------------------------------------------------------------------------------------------

	
	// Bring up create view of Catalog Download 
	public function create()
	{
		$export_types = ExportType::all();

		return View::make('catalog_downloads.create')
		->with('export_types', $export_types);
	}
	
	//-------------------------------------------------------------------------------------------------
	

	//Store the Catalog download 
	public function store()
	{
		$validator = CatalogDownload::validator(Input::all());

		if ($validator->fails()) {
			return Redirect::to('catalog_downloads/create')
			->withErrors($validator)->withInput();
			
		}

		$catalog_download        = new CatalogDownload;
		$catalog_download->title = Input::get('title');
		$catalog_download->note  = Input::get('note');
		$catalog_download->title = ucfirst($catalog_download->title);
		$catalog_download->title = preg_replace_callback('/ ([a-z]?)/', 

		function($match) {
			return strtoupper($match[1]);
		}

		, $catalog_download->title );

		$catalog_download->user_id = Auth::user()->id;
		$catalog_download->save();

		// 1 = Monthly Default Value
		$export_frequencies = Input::get('export_frequencies', 1 ); 


		// If there is $export_frequencies checkboxes is check, syn them in my pivot table
	    if (isset($export_frequencies)){	
	    	$catalog_download->export_frequencies()->sync($export_frequencies);
	    }


		// Loop through all the export_type and save them into a certain path
		// I stored them in to their own folder
		// I store them /app/files/ which is behind the public folder for a better security reasons
		foreach (ExportType::all() as $export_type)
		{
			
			
			if (Input::hasFile('type_' . $export_type->id))
			{
				$product_export  = new ProductExport;
				
				$zip             = Input::file('type_' . $export_type->id);
				$filename        = $zip->getClientOriginalName();
				$filesize        = $zip->getSize();
				
				$destinationPath = base_path().'/app/files/product_export/'. $catalog_download->id.'/'. $export_type->id.'/';
				$uploadSuccess   = $zip->move($destinationPath, $filename  );
				
				if  (!isset($uploadSuccess )) 
				{
					return Redirect::to('catalog_downloads/create')
					->with('error', 'Problem during upload')
					->withInput();			
				}


				$product_export->file_path           =  $filename ;
				
				$product_export ->exported_date      = DateHelper::getDateFormatMySQL(Input::get('exported_date'));
				$product_export->catalog_download_id = $catalog_download->id;
				$product_export->export_type_id      = $export_type->id;
				$product_export->size                = $filesize;
				$product_export->save();
			}


		}


		// Create an activity log, and save it in the database
		$name         = ucfirst($catalog_download->title);
		$log          = new ActivityLog;
		$log->action  = "Store";
		$log->object  = "Catalog";
		$log->name    = $name;
		$log->user    = Auth::user()->username;
		$log->user_id = Auth::user()->id;
		$log->save(); 



		return Redirect::to('catalog_downloads/')
		->with('success','The catalog_download was created succesfully!')

		;

		
	}


	//-------------------------------------------------------------------------------------------------

	// Show all the catalog download
	public function show($id)
	{
		
		
		$catalog_downloads = CatalogDownload::findOrFail($id);
		$catalog_download  = CatalogDownload::findOrFail($id);
		$product_exports   = $catalog_download->product_exports()->get();
		$export_types      = ExportType::all();
		

		return View::make('catalog_downloads.show')
		->with('catalog_downloads', $catalog_downloads)
		->with('catalog_download', $catalog_download )
		->with('product_exports', $product_exports)
		->with('export_types', $export_types)
		;
		

	}

	//-------------------------------------------------------------------------------------------------


	// Allow the Distributor to download the product list
	// Note: They will only allow to download the one that match their export frequencies
	public function file_download($id)
	{
		
		$catalog_download 	= CatalogDownload::findOrFail($id);
		$distributorUser    = Auth::user()->distributor()->first();
		$distributor 		= $distributorUser->dist()->first();
		$export_type      	= $distributor->export_type()->first();
		$product_export 	=  $catalog_download->product_exports()->first();

		$destinationPath  = base_path().'/app/files/product_export/'. $catalog_download->id.'/'. $export_type->id.'/';
		$file_name        = $product_export->file_path;
		$pathToFile       = $destinationPath .$file_name;

		$success = Response::download($pathToFile);

		
		// Keep track of who downloading what 
		// This information will be helpful for The Bioss Team
		if($success == true ){

			$user = Auth::user();
			$user->cd_count  = $user->cd_count + 1;
			$user->save(); 

			$download = new Download;
			$download->title  = $catalog_download->title;
			$download->user_id = Auth::user()->id ;
			$download->save(); 

				$name         = ucfirst($catalog_download->title);
				$log          = new ActivityLog;
				$log->action  = "Download";
				$log->object  = "Catalog";
				$log->name    = $name;
				$log->user    = Auth::user()->username;
				$log->user_id = Auth::user()->id;
				$log->save(); 


		}
		
		return Response::download($pathToFile);


	}
	
	//-------------------------------------------------------------------------------------------------

	// Allow Bioss Internal users to download the product list
	// Everyone in Bioss will be able to download all of the product list
	public function file_download_internal($catalog_id, $export_type_id)
	{

		$catalog_download = CatalogDownload::findOrFail($catalog_id);
		$product_export =  $catalog_download->product_exports()->first();
		
		$destinationPath  = base_path().'/app/files/product_export/'. $catalog_download->id.'/'. $export_type_id.'/';
		$file_name        = $product_export->file_path;
		$pathToFile       = $destinationPath .$file_name;

		$success = Response::download($pathToFile);


		if($success == true ){

			$user = Auth::user();
			$user->cd_count  = $user->cd_count + 1;
			$user->save(); 

			$download = new Download;
			$download->title  = $catalog_download->title;
			$download->user_id = Auth::user()->id ;
			$download->save(); 

				$name         = ucfirst($catalog_download->title);
				$log          = new ActivityLog;
				$log->action  = "Download";
				$log->object  = "Catalog";
				$log->name    = $name;
				$log->user    = Auth::user()->username;
				$log->user_id = Auth::user()->id;
				$log->save();


		}


		return Response::download($pathToFile);

	}

	

	//-------------------------------------------------------------------------------------------------

	// Bring up the Edit form for the Catalog Download
	public function edit($id)
	{

		$catalog_download = CatalogDownload::findOrFail($id);
		$product_export   = $catalog_download->product_exports()->get()->first();
		$export_types = ExportType::all();

		return View::make('catalog_downloads.edit')
		->with('catalog_download', $catalog_download)
		->with('product_export', $product_export)
		->with('export_types', $export_types)
		;





	}
	//-------------------------------------------------------------------------------------------------


	// Update the Catalog Download
	// When name is change, the old folder will that name will be auto delete
	// New folder with new nam will be auto create
	public function update($id)
	{
		$validator = CatalogDownload::edit_validator(Input::all());

		if ($validator->fails()) {
			return Redirect::to('catalog_downloads/'. $id . '/edit')
			->withErrors($validator)->withInput();

		}else {


			$catalog_download        = CatalogDownload::findOrFail($id);
			$catalog_download->title = Input::get('title');
			$catalog_download->note  = Input::get('note');
			
			$catalog_download->save();



			$export_frequencies = Input::get('export_frequencies');

		
			if (isset($export_frequencies)){	
				$catalog_download->export_frequencies()->sync($export_frequencies);
			}




			foreach (ExportType::all() as $export_type)
			{
				
				if (Input::hasFile('type_' . $export_type->id))
				{
					
					$success = File::deleteDirectory(base_path().'/app/files/product_export/'. $catalog_download->id.'/'. $export_type->id.'/');


		
					$product_export  = new ProductExport;
					
					$zip             = Input::file('type_' . $export_type->id);
					$filename        = $zip->getClientOriginalName();
					$filesize        = $zip->getSize();
					
					$destinationPath = base_path().'/app/files/product_export/'. $catalog_download->id.'/'. $export_type->id.'/';
					$uploadSuccess   = $zip->move($destinationPath, $filename );
					
					
					

					if  (!isset($uploadSuccess )) 
					{
						return Redirect::to('catalog_downloads/create')
						->with('error', 'Problem during upload')
						->withInput();			
					}


					$product_export->file_path           =  $filename;
					
					$product_export ->exported_date      = DateHelper::getDateFormatMySQL(Input::get('exported_date'));
					$product_export->catalog_download_id = $catalog_download->id;
					$product_export->export_type_id      = $export_type->id;




					$product_export->size                = $filesize;


					
					
					$product_export->save();
				}


			}


				$name         = ucfirst($catalog_download->title);
				$log          = new ActivityLog;
				$log->action  = "Update";
				$log->object  = "Catalog";
				$log->name    = $name;
				$log->user    = Auth::user()->username;
				$log->user_id = Auth::user()->id;
				$log->save();


			return Redirect::to('catalog_downloads/')
			->with('success','The catalog_download was updated succesfully!');

		}
	}
	//-------------------------------------------------------------------------------------------------


	// Delete a Catalog Download
	public function destroy($id){
		
		//get the catalog_download
		$catalog_download = CatalogDownload::findOrFail($id);
		$name = ucfirst($catalog_download->title);

		$catalog_download->delete();

		
				$log          = new ActivityLog;
				$log->action  = "Delete";
				$log->object  = "Catalog";
				$log->name    = $name;
				$log->user    = Auth::user()->username;
				$log->user_id = Auth::user()->id;
				$log->save();

		return Redirect::to('catalog_downloads')
		->with('success','The catalog_download was deleted succesfully!');

	}
	//-------------------------------------------------------------------------------------------------

}
