<?php
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DistributorController extends BaseController {


	// Bring up the distributor list 'continent view'
	public function index() {

		$users = User::all();
		$continents = Continent::all();
		$distributors = Distributor::all();
		$count = DB::table('distributors')->count();

		return View::make('distributors.index')

		->with('users',$users)
		->with('count',$count)
		->with('distributors',$distributors)
		->with('continents',$continents);


	}

	//-------------------------------------------------------------------------------------------------


	// Bring up the distributor list 'list view'
	public function list_view(){
		$distributors = Distributor::orderBy('tier_id')->get();
		$continents = Continent::all();
		return View::make('distributors.list_view')
		->with('distributors',$distributors)
		->with('continents',$continents);


	}

	//-------------------------------------------------------------------------------------------------


	// Bring up the create form for distributor
	public function create(){
		return View::make('distributors.create');
	}

    function compress($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }


	//-------------------------------------------------------------------------------------------------


	// Store distributor information
	public function store()
	{
		// This is a tough one. Simon helped me with this section
		// Display all the errors at the end
		$distributor_validator = Distributor::validator(Input::all());
		$contact_validator = Contact::validator(Input::all());
		$address_validator = Address::validator(Input::all());

		if ($distributor_validator->fails()
			|| $contact_validator->fails()
			|| $address_validator->fails())

			{
				$distributor_errors = $distributor_validator->errors();
				$contact_errors = $contact_validator->errors();
				$address_errors = $address_validator->errors();
				return Redirect::to('distributors/create')
				->withErrors($distributor_errors->merge($contact_errors->merge($address_errors)))
				->withInput();
			}

        $original_filename = '';
        $thumbnail_filename = '';
        if (Input::hasFile('logo_path')) {
            $file = Input::file('logo_path');
            $basePath = base_path() . '/app/files/logo_path/';
            //resize image
            $info = getimagesize($file);
            $thumbnail_filename = 'thumbnail_' . $file->getClientOriginalName();
            $destinationPath = $basePath . $thumbnail_filename;
            $d = self::compress($file, $destinationPath, 50);

            $compressed_file = new UploadedFile(
                $d,
                $thumbnail_filename,
                $info['mime'],
                $file->getClientSize(),
                null,
                TRUE
            );
            $thumbnail_filename = $compressed_file->getClientOriginalName();
            FileUploader::UploadViaSsh($compressed_file, $thumbnail_filename);
            $original_filename = 'original_' . $file->getClientOriginalName();
            //upload original image via ssh
            FileUploader::UploadViaSsh($file, $original_filename);
            //upload original image on local
            $file->move($basePath, $original_filename);
        }

		// Saving distributor Information to distributors table

		$distributor                     = new Distributor;
		$distributor->type               = Input::get('type');
		$distributor->company_name       = Input::get('company_name');
		$distributor->url                = Input::get('url');
		$distributor->phone_public       = Input::get('phone_public');
		$distributor->email_public       = Input::get('email_public');
		$distributor->sale_region        = Input::get('sale_region');
		$distributor->start_date         = Input::get('start_date');
		$distributor->discount_rate_info = Input::get('discount_rate_info');
		$distributor->activity_log       = Input::get('activity_log');
		$distributor->internal_note      = Input::get('internal_note');
		$distributor->country_id         = Country::where('name','=', Input::get('country'))->first()->id;
		$distributor->continent_id       = Country::where('name','=', Input::get('country'))->first()->continent_id;
		$distributor->tier_id            = Input::get('tier');
		$distributor->export_frequency_id= Input::get('export_frequency', 'Monthly');
		$distributor->export_type_id     = Input::get('export_type');
		$distributor->logo_path = $original_filename;
		$distributor->thumbnail_path = $thumbnail_filename;

		//Logistics
		$distributor->payment_method     = Input::get('payment_method');
		$distributor->shipping_carrier   = Input::get('shipping_carrier');
		$distributor->shipping_number    = Input::get('shipping_number');
		if($distributor->payment_method == 'Shipper Paid'){
			$distributor->shipping_carrier = '';
			$distributor->shipping_number  = '';
		}
		$distributor->active = 1;
		$distributor->user_id = Auth::user()->id;

		$distributor->save();




		// Saving distributor contact Information to contacts table
		foreach (['main', 'sale', 'support'] as $type) {
			$contact                         = new Contact;
			$contact->type                   = ucfirst($type);
			$contact->firstname              = Input::get('firstname_' . $type);
			$contact->lastname               = Input::get('lastname_' . $type);
			$contact->phone                  = Input::get('phone_' . $type);
			$contact->title                  = Input::get('title_' . $type);
			$contact->email                  = Input::get('email_' . $type);
			$contact->distributor_id         = $distributor->id;
			$contact->save();
		}


		// Saving distributor address Information to addresses table
		foreach (['billing', 'shipping', 'hq'] as $type) {
			$address                         = new Address;
			$address->type                   = ucfirst($type);
			$address->adline1                = Input::get('adline1_'. $type);
			$address->adline2                = Input::get('adline2_'. $type);
			$address->city                   = Input::get('city_'. $type);
			$address->state                  = Input::get('state_'. $type);
			$address->postcode               = Input::get('postcode_'. $type);
			$address->distributor_id         = $distributor->id;
			if (Input::get('country_'. $type))
				$address->country_id             = Country::where('name','=', Input::get('country_'. $type))->firstOrFail()->id;
			else
				$address->country_id             = $distributor->country_id;
			$address->save();
		}


		$name         = ucfirst($distributor->company_name);
		$log          = new ActivityLog;
		$log->action  = "Store";
		$log->object  = "Distributor";
		$log->name    = $name;
		$log->user    = Auth::user()->username;
		$log->user_id = Auth::user()->id;
		$log->save();

		if (Input::get('send_invitation'))
		{
			return Redirect::to('/distributors/' . $distributor->id . '/send_invitation');
		}
		return Redirect::to('/distributors/list_view')
			->with('work',' The distributor <b class ="cool-green">'.$distributor->company_name.'</b> was created succesfully! ');
	}


	//-------------------------------------------------------------------------------------------------


	// Show all distributor information
	public function show($id)
	{
		$distributor = Distributor::findOrFail($id);
		//$user = $distributor->user()->firstOrFail();
		$export_type = $distributor->export_type()->first();
		$addresses = $distributor->addresses()->get();
		foreach ($addresses as $address){
			$country = $address->country()->first();
		}
		$main_contact = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Main')->first();
		$sale_contact = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Sale')->first();
		$support_contact = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Support')->first();

		$billing_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Billing')->first();
		$shipping_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Shipping')->first();
		$hq_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Hq')->first();


		return View::make('distributors.show')
		//->with('user', $user )
		->with('distributor', $distributor)
		->with('export_type', $export_type )
		->with('main_contact', $main_contact )
		->with('sale_contact', $sale_contact )
		->with('support_contact', $support_contact )
		->with('billing_address', $billing_address )
		->with('shipping_address', $shipping_address )
		->with('hq_address', $hq_address )
		->with('addresses', $addresses );
	}


	//-------------------------------------------------------------------------------------------------


	// Email out an invitation link to a distributor
	public function invite($id)
	{
		$distributor = Distributor::findOrFail($id);
		$user = $distributor->user()->firstOrFail();


		if( $distributor->type == "OEM" ){

			Mail::send('emails.auth.activate_oem', array(
				'link'     => URL::route('account-set-password', $user->code),
				'username' => $user->username),
				function ($message) use ($user) {
					$message->to( $user->email, $user->username)
					->replyTo('distributor@biossusa.com', 'Bioss Antibodies')
					->subject('Welcome to the Bioss Distributor Portal');
				}
			);

		}else{

			Mail::send('emails.auth.activate', array(
				'link'     => URL::route('account-set-password', $user->code),
				'username' => $user->username),
				function ($message) use ($user) {
					$message->to( $user->email, $user->username)
					->replyTo('distributor@biossusa.com', 'Bioss Antibodies')
					->subject('Welcome to the Bioss Distributor Portal');
				}
			);
		}

		// Keep track of sending invitation
		$user->send_invitation = $user->send_invitation + 1 ;
		$user->save();


		return Redirect::to('/distributors/'.$distributor->id)
		->with('email',' Invitation has been sent to <b class ="cool-blue">'.
			$distributor->company_name.
			'</b> ( <span class="blue">'.$user->email.'</span> ) <small> to set their password and activate their account.</small>');
	}


	//-------------------------------------------------------------------------------------------------


	// Bring up an Edit form for a distributor with prefilled information
	public function edit($id)
	{
		$distributor = Distributor::findOrFail($id);

		$distributor->load('country');

		$export_type = $distributor->export_type()->first();

		$addresses = $distributor->addresses()->get();
		foreach ($addresses as $address){
			$country = $address->country()->first();
		}
		$main_contact = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Main')->first();
		$sale_contact = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Sale')->first();
		$support_contact = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Support')->first();

		$billing_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Billing')->first();
		$shipping_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Shipping')->first();
		$hq_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Hq')->first();


		if ($billing_address && $billing_address->has('country')) {
			$billing_address->load('country');
		}

		if ($shipping_address && $shipping_address->has('country')) {
			$shipping_address->load('country');
		}

		if ($hq_address && $hq_address->has('country')) {
			$hq_address->load('country');
		}

		return View::make('distributors.edit')
		->with('distributor', $distributor)
		->with('export_type', $export_type )
		->with('main_contact', $main_contact )
		->with('sale_contact', $sale_contact )
		->with('support_contact', $support_contact )
		->with('billing_address', $billing_address )
		->with('hq_address', $hq_address )
		->with('shipping_address', $shipping_address );
	}


	//-------------------------------------------------------------------------------------------------


	// Posting the update information of a distributor to database
	public function update($id)
	{

	    $filename = '';

		// Variables
		$distributor      = Distributor::findOrFail($id);
		$contacts          = $distributor->contacts()->get();
		$addresses          = $distributor->addresses()->get();


		$main_contact     = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Main')->first();
		$sale_contact     = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Sale')->first();
		$support_contact  = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Support')->first();

		$billing_address  = Address::where('distributor_id', '=', $id)->where('type', '=', 'Billing')->first();
		$shipping_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Shipping')->first();
		$hq_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Hq')->first();



		$distributor_validator = Distributor::validator(Input::all());
		$contact_validator = Contact::validator(Input::all());
		$address_validator = Address::validator(Input::all());



		if
				(

				$distributor_validator->fails() ||
				$contact_validator->fails() ||
				$address_validator->fails()

				){


				$distributor_errors = $distributor_validator->errors();
				$contact_errors     = $contact_validator->errors();
				$address_errors     = $address_validator->errors();

				return Redirect::to('distributors/'.$id.'/edit')
					->withErrors($distributor_errors->merge($contact_errors->merge($address_errors)))
					->withInput();
			}



			$logo_path                      = Input::file('logo_path');

            if (Input::hasFile('logo_path')) {
                $file = Input::file('logo_path');
                $basePath = base_path() . '/app/files/logo_path/';
                //resize image
                $info = getimagesize($file);
                $thumbnail_filename = 'thumbnail_' . $file->getClientOriginalName();
                $destinationPath = $basePath . $thumbnail_filename;
                $d = self::compress($file, $destinationPath, 50);

                $compressed_file = new UploadedFile(
                    $d,
                    $thumbnail_filename,
                    $info['mime'],
                    $file->getClientSize(),
                    null,
                    TRUE
                );
                $thumbnail_filename = $compressed_file->getClientOriginalName();
                FileUploader::UploadViaSsh($compressed_file, $thumbnail_filename);
                $original_filename = 'original_' . $file->getClientOriginalName();
                //upload original image via ssh
                FileUploader::UploadViaSsh($file, $original_filename);
                //upload original image on local
                $file->move($basePath, $original_filename);
            }


			// Distributor Information
			$distributor->user_id = Auth::user()->id;
			$distributor->company_name = Input::get('company_name');
			$distributor->url          = Input::get('url');
			$distributor->phone_public = Input::get('phone_public');
			$distributor->email_public = Input::get('email_public');
			$distributor->country_id   = Country::where('name','=', Input::get('country'))->first()->id;
            if (isset($thumbnail_filename) && isset($original_filename)) {
                $distributor->thumbnail_path = $thumbnail_filename;
                $distributor->logo_path = $original_filename;
            }


			//Logistics Section
			$distributor->payment_method   = Input::get('payment_method');
			$distributor->shipping_carrier = Input::get('shipping_carrier');
			$distributor->shipping_number  = Input::get('shipping_number');

			if($distributor->payment_method == 'Shipper Paid'){

				$distributor->shipping_carrier  = '';
				$distributor->shipping_number   = '';
			}
			if(Auth::user()->type            == 'Bioss' OR Auth::user()->type == 'Admin' ) {

				$distributor->start_date         = Input::get('start_date');
				$distributor->type               = Input::get('type');
				$distributor->tier_id            = Input::get('tier');
				$distributor->export_frequency_id= Input::get('export_frequency');
				$distributor->sale_region        = Input::get('sale_region');
				$distributor->export_type_id     = Input::get('export_type');
				$distributor->discount_rate_info = Input::get('discount_rate_info');
				$distributor->internal_note      = Input::get('internal_note');
					//Logistics
				$distributor->payment_method     = Input::get('payment_method');
				$distributor->shipping_carrier   = Input::get('shipping_carrier');
				$distributor->shipping_number    = Input::get('shipping_number');

				if($distributor->payment_method == 'Shipper Paid'){

					$distributor->shipping_carrier = '';
					$distributor->shipping_number  = '';
				}

				$distributor->activity_log       = Input::get('activity_log');
				if (Input::get('end_date')) {
					$distributor->end_date           = Input::get('end_date');
				} else {
					$distributor->end_date           =  NULL ;
				}



				if($distributor->end_date != NULL) {
					$endDateT = date_create_from_format('Y-m-d', $distributor->end_date);
					$curDateT = new DateTime();
					
					if($curDateT > $endDateT) {
						$distributor->active = 2;
						$distributor->save();
					}
				} else {
					$distributor->active = 1;
				}

				$distributor->save();
			}
			else {

				$distributor->save();
			}


		// Distributor Contact Information
		$main_contact->type               = 'Main';
		$main_contact->firstname          = Input::get('firstname_main');
		$main_contact->lastname           = Input::get('lastname_main');
		$main_contact->phone              = Input::get('phone_main');
		$main_contact->title              = Input::get('title_main');
		$main_contact->email              = Input::get('email_main');
		$main_contact->distributor_id     = $distributor->id;
		$main_contact->save();
		$sale_contact->type               = 'Sale';
		$sale_contact->firstname          = Input::get('firstname_sale');
		$sale_contact->lastname           = Input::get('lastname_sale');
		$sale_contact->phone              = Input::get('phone_sale');
		$sale_contact->title              = Input::get('title_sale');
		$sale_contact->email              = Input::get('email_sale');
		$sale_contact->distributor_id     = $distributor->id;
		$sale_contact->save();
		$support_contact->type            = 'Support';
		$support_contact->firstname       = Input::get('firstname_support');
		$support_contact->lastname        = Input::get('lastname_support');
		$support_contact->phone           = Input::get('phone_support');
		$support_contact->title           = Input::get('title_support');
		$support_contact->email           = Input::get('email_support');
		$support_contact->distributor_id  = $distributor->id;
		$support_contact->save();



		// Distributor Address Information
		$shipping_address->type           = 'Shipping';
		$shipping_address->adline1        = Input::get('adline1_shipping');
		$shipping_address->adline2        = Input::get('adline2_shipping');
		$shipping_address->city           = Input::get('city_shipping');
		$shipping_address->state          = Input::get('state_shipping');
		$shipping_address->postcode       = Input::get('postcode_shipping');
		$shipping_address->distributor_id = $distributor->id;
		if (Input::get('country_shipping'))
			$shipping_address->country_id     = Country::where('name','=', Input::get('country_shipping'))->firstOrFail()->id;
		else
			$shipping_address->country_id     = $distributor->country_id;
		$shipping_address->save();


		$billing_address->type            = 'Billing';
		$billing_address->adline1         = Input::get('adline1_billing');
		$billing_address->adline2         = Input::get('adline2_billing');
		$billing_address->city            = Input::get('city_billing');
		$billing_address->state           = Input::get('state_billing');
		$billing_address->postcode        = Input::get('postcode_billing');
		$billing_address->distributor_id  = $distributor->id;
		if (Input::get('country_billing'))
			$billing_address->country_id      = Country::where('name','=', Input::get('country_billing'))->firstOrFail()->id;
		else
			$billing_address->country_id      = $distributor->country_id;
		$billing_address->save();

		$hq_address->type            = 'Hq';
		$hq_address->adline1         = Input::get('adline1_hq');
		$hq_address->adline2         = Input::get('adline2_hq');
		$hq_address->city            = Input::get('city_hq');
		$hq_address->state           = Input::get('state_hq');
		$hq_address->postcode        = Input::get('postcode_hq');
		$hq_address->distributor_id  = $distributor->id;
		if (Input::get('country_hq'))
			$hq_address->country_id      = Country::where('name','=', Input::get('country_hq'))->firstOrFail()->id;
		else
			$hq_address->country_id      = $distributor->country_id;
		$hq_address->save();


		$name         = ucfirst($distributor->company_name);

		$log          = new ActivityLog;
		$log->action  = "Update";
		$log->object  = "Distributor";
		$log->name    = $name;
		$log->user    = Auth::user()->username;
		$log->user_id = Auth::user()->id;
		$log->save();


		// Give Admin user a feedback on who they just edited
		// I find that really useful
		// Rather than just display "user was edited succesfully!"
		// Base on their user type the alert message will be slightly different

		if(Auth::user()->type == "Bioss" OR Auth::user()->type == "Admin" )
			return Redirect::to('/distributors/'.$id)
				->with('work',' The distributor <b class ="cool-green">'. $distributor->company_name.'</b> was updated succesfully! ');
		else
			return Redirect::to('/distributors/'.$id)
				->with('success','Your account information was updated succesfully!');

	}

	//-------------------------------------------------------------------------------------------------

    /*public function list_view_image(){
	    $id = \Illuminate\Support\Facades\Input::get('distributor');
        $distributor = Distributor::find($id);
        return Response::json(array(
            'url' => $distributor->url ? "http://".str_replace("http://","",$distributor->url) : '#',
            'logo_path' => $distributor->logo_path ? "/files/thumbnail_path/{$distributor->id}" : '/img/default.PNG',
        ));
    }*/

    //-------------------------------------------------------------------------------------------------

	// No destroy function here because I use the one the UserController

}