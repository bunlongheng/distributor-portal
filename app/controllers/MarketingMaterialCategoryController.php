<?php

class MarketingMaterialCategoryController extends BaseController {


    public function index()
    {

        $marketing_material_categories = MarketingMaterialCategory::orderBy('order','asc')->get();

        return View::make('marketing_material_categories.index')
        ->with('marketing_material_categories',$marketing_material_categories);

    }
    
    //------------------------------------------------------------------------------------------------- [ Create]

    
    public function create()
    {

        return View::make('marketing_material_categories.create');
    }

    //------------------------------------------------------------------------------------------------- [ Store ]

    
    public function store()
    {
        $validator = MarketingMaterialCategory::validator(Input::all());

        if ($validator->fails()) {
            return Redirect::to('marketing_material_categories/create')
            ->withErrors($validator)->withInput();

        } else {

            $marketing_material_category              = new MarketingMaterialCategory;
            $marketing_material_category->name       = Input::get('name');
            $marketing_material_category->order       = Input::get('order');
            

            $marketing_material_category->save();


            return Redirect::to('/marketing_material_categories')
            ->with('success','The marketing_material_category was created succesfully!');

        }
    }
    
    //------------------------------------------------------------------------------------------------- [ Show ]


    public function show($id)
    {

        $marketing_material_category = MarketingMaterialCategory::findOrFail($id);

        return View::make('marketing_material_categories.show')
        ->with('marketing_material_category', MarketingMaterialCategory::find($id));
    }
    
    //------------------------------------------------------------------------------------------------- [ Edit ]


    public function edit($id)
    {

        $marketing_material_category = MarketingMaterialCategory::findOrFail($id);

        return View::make('marketing_material_categories.edit')
        ->with('marketing_material_category', MarketingMaterialCategory::find($id));
    }

    //------------------------------------------------------------------------------------------------- [ Update ]

    
    public function update($id)
    {
        $validation = MarketingMaterialCategory::validator(Input::all());

        if ($validation->fails()) {

            return Redirect::to('marketing_material_categories/'. $id . '/edit')->withErrors($validation)->withInput();

        } else {




           $marketing_material_category       = MarketingMaterialCategory::findOrFail($id);
           $marketing_material_category->name = Input::get('name');
           $marketing_material_category->order       = Input::get('order');
           $marketing_material_category->save();


           return Redirect::to('marketing_material_categories')
           ->with('success','The marketing_material_category was updated succesfully!');
       }
   }
    //------------------------------------------------------------------------------------------------- [ Destroy ]

   public function destroy($id){

    $marketing_material_category = MarketingMaterialCategory::find($id);

    $marketing_material_category->delete();

    return Redirect::to('marketing_material_categories')
    ->with('success','The marketing_material_category was deleted succesfully!');

}

}
