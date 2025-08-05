<?php

class MarketingMaterialController extends BaseController {


    public function index()
    {

        $marketing_materials = MarketingMaterial::orderBy('created_at','desc')->paginate(12);
        $marketing_materials_categories = MarketingMaterialCategory::all();
        





        return View::make('marketing_materials.index')
        ->with('marketing_materials',$marketing_materials)
        ->with('marketing_materials_categories',$marketing_materials_categories)
        

        ;

    }
    
    //------------------------------------------------------------------------------------------------- [ Create]

    
    public function create()
    {

        return View::make('marketing_materials.create');
    }

    //------------------------------------------------------------------------------------------------- [ Store ]

    
    public function store()
    {
        $validator = MarketingMaterial::validator(Input::all());

        if ($validator->fails()) {
            return Redirect::to('marketing_materials/create')
            ->withErrors($validator)
            ->withInput();

        } else {

            $marketing_material                                  = new MarketingMaterial;
            
            
            $marketing_material->title                           = Input::get('title');
            $marketing_material->description                     = Input::get('description');
            $marketing_material->marketing_materials_category_id = Input::get('marketing_materials_category_id');
            $category_id = $marketing_material->marketing_materials_category_id;
            
            
            $marketing_material->user_id                         = Auth::user()->id;

            


            $thumb_path = Input::file('thumb_path');

            if (Input::hasFile('thumb_path'))
            {

                $file            = Input::file('thumb_path');
                $destinationPath = base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/thumb_path/';
                $filename        = $file->getClientOriginalName();
                $extention       = $file->getClientOriginalExtension();
                $filesize        = $file->getSize();
                $uploadSuccess   = $file->move($destinationPath, $filename);
                

                $marketing_material->thumb_path = $filename;
            }


            $media_path = Input::file('media_path');

            if (Input::hasFile('media_path'))
            {

                $file            = Input::file('media_path');
                $destinationPath = base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/media_path/';
                $filename        = $file->getClientOriginalName();
                $extention       = $file->getClientOriginalExtension();
                $filesize        = $file->getSize();
                $uploadSuccess   = $file->move($destinationPath, $filename);
                

                $marketing_material->media_path = $filename;
                $marketing_material->media_size = $filesize;
                $marketing_material->ext = $extention;
            }

            $marketing_material->resolution                           = Input::get('resolution');
            $marketing_material->print_size                           = Input::get('print_size');


            $marketing_material->save();


            return Redirect::to('/marketing_materials')
            ->with('success','The electronic marketing material was created succesfully!');

        }
    }
    
    //------------------------------------------------------------------------------------------------- [ Show ]


    public function show($id)
    {

        $marketing_material = MarketingMaterial::findOrFail($id);
        $marketing_materials = MarketingMaterial::orderBy('created_at','desc')->get();

        return View::make('marketing_materials.show')
        ->with('marketing_material',$marketing_material)
        ->with('marketing_materials',$marketing_materials)



        ;


    }

    //------------------------------------------------------------------------------------------------- [ Download ]


    public function thumb_download($id)
    {

        $marketing_material = MarketingMaterial::findOrFail($id);

        $destinationPath  = base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/thumb_path/';
        $file_name        = $marketing_material->thumb_path;
        $pathToFile       = $destinationPath .$file_name;

        return Response::download($pathToFile);
    }


    public function media_download($id)
    {

        $marketing_material = MarketingMaterial::findOrFail($id);

        $destinationPath  = base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/media_path/';
        $file_name        = $marketing_material->media_path;
        $pathToFile       = $destinationPath .$file_name;

        $success = Response::download($pathToFile);

        if($success == true ){

            $user = Auth::user();
            $user->mmd_count  = $user->mmd_count + 1;
            $user->save(); 

            $download = new Download;
            $download->title  = $marketing_material->title;
            $download->user_id = Auth::user()->id ;
            $download->save(); 

            $name         = ucfirst($marketing_material->title);
            $log          = new ActivityLog;
            $log->action  = "Download";
            $log->object  = "MarketingMaterial";
            $log->name    = $name;
            $log->user    = Auth::user()->username;
            $log->user_id = Auth::user()->id;
            $log->save();

        }

        return Response::download($pathToFile);
    }


    
    //------------------------------------------------------------------------------------------------- [ Edit ]


    public function edit($id)
    {

     $marketing_material = MarketingMaterial::findOrFail($id);

     return View::make('marketing_materials.edit')
     ->with('marketing_material',$marketing_material)

     ;
 }

    //------------------------------------------------------------------------------------------------- [ Update ]


    public function update($id){
        

        $validation = MarketingMaterial::validator_edit(Input::all(), $id );

        if ($validation->fails()) {

            return Redirect::to('marketing_materials/'. $id . '/edit')->withErrors($validation)->withInput();

        } else {


            $marketing_material                                  = MarketingMaterial::findOrFail($id);

            if (Input::hasFile('thumb_path'))
            {

                $success = File::deleteDirectory(base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/thumb_path');

                $file            = Input::file('thumb_path');
                $destinationPath = base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/thumb_path/';
                $filename        = $file->getClientOriginalName();
                $uploadSuccess   = $file->move($destinationPath, $filename);

                $marketing_material->thumb_path = $filename;
                
            }


        // Only the media_path was given 
        if  (Input::hasFile('media_path')) {


            $success = File::deleteDirectory(base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/media_path');

            $file            = Input::file('media_path');
            $destinationPath = base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/media_path/';
            $filename        = $file->getClientOriginalName();
            $extention       = $file->getClientOriginalExtension();
            $filesize        = $file->getSize();
            $uploadSuccess   = $file->move($destinationPath, $filename);
            
            $marketing_material->media_path = $filename;
            $marketing_material->media_size = $filesize;
            $marketing_material->ext = $extention;

        }

        $old_title = $marketing_material->title;
        $compare_title = strcmp( $old_title , Input::get('title'));
        // dd( $compare_title ); // = 0 mean that, they're match 

        
        // File Structure rely on title : Becareful !! 
        if  ( $compare_title !== 0 ) {


            $marketing_material->title                           = Input::get('title');
            
            $new_path = base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/';
            $old_path = base_path().'/app/files/marketing_materials/'.$old_title.'/';

            $copy_directory = File::copyDirectory($old_path, $new_path);
            $delete_directory = File::deleteDirectory( $old_path );

        }



        //Otherwise, just update these 2 
        $marketing_material->description                     = Input::get('description');
        $marketing_material->marketing_materials_category_id = Input::get('marketing_materials_category_id');

        $marketing_material->resolution                           = Input::get('resolution');
        $marketing_material->print_size                           = Input::get('print_size');


        $marketing_material->save();


        return Redirect::to('marketing_materials')
        ->with('success','The electronic marketing material was updated succesfully!');
    

        }
    }
        
    //------------------------------------------------------------------------------------------------- [ Destroy ]

    public function destroy($id){

        $marketing_material = MarketingMaterial::find($id);

        $marketing_material->delete();
        $success = File::deleteDirectory(base_path().'/app/files/marketing_materials/'.$marketing_material->title.'/');

        return Redirect::to('marketing_materials')
        ->with('success','The electronic marketing material was deleted succesfully!');

    }

}
