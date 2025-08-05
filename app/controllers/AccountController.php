<?php

// Account Authentication Features
class AccountController extends BaseController {

	
	// Bring up the sign-in page
	public function getSignIn(){
		return View::make('account.signin');
	}

	

	// Posting the sign-in information and check it with the database
	public function postSignIn() {
		$validator = Validator::make( Input::only('username','password'),
			array(
				'username'       =>'required',
				'password'       =>'required'
				)
			);
		if ($validator->fails()) {
			return Redirect::route('account-sign-in-post')
			->with('error','Please fill out your information ')
			->withErrors($validator)->withInput();
		}

		// Remember Me
		$remember = (Input::has('remember')) ? true : false ;

		$auth = Auth::attempt(array(
			'username' => strtolower(Input::get('username')),
			'password' => Input::get('password'),
			'active' => 1),
		$remember);


		if($auth) {
		
			// Keep track on log-in information of the user.
			$user = Auth::user();
			$user->last_logged_in = Input::get('created_at');
			$user->logged_in_count = $user->logged_in_count + 1 ;
			$user->is_online = '1';
			$user->save();

			return Redirect::to('/')
			->with('success','You have been successfully logged in.')
			;
		} 
		else {
			return Redirect::route('account-sign-in')
			->with('error','Username/Password Wrong or account has not been activated !')
			->withInput(Input::except('password'))
			->withErrors($validator);
		}

	}



	//-------------------------------------------------------------------------------------------------


	

	// Bring up the sign-up page
	// This function is not using at this moment.
	public function getCreate(){
		return View::make('account.create_account');
	}


	// Posting all the sign-up information and sent out an activation email at the end
	// This function is not using at this moment.
	public function postCreate(){
		
		$validator = Validator::make( Input::all(), array(
			'firstname'      => 'required|min:2|max:20',
			'lastname'       => 'required|min:2|max:20',
			'email'          =>'required|max:50|email|unique:users',
			'username'       =>'required|max:20|min:3|unique:users',
			// 'password'       =>'required|min:2',
			// 'password_again' =>'required|same:password'
			));

		if ($validator->fails()) {
			return Redirect::route('account-create')
			->withErrors($validator)
			->withInput();
		}

		$email     = Input::get('email');
		$firstname = Input::get('firstname');
		$lastname  = Input::get('lastname');
		$username  = Input::get('username');

		// Activation code 
		$code = str_random(60);

		$user = User::create(array(
			'email'     => $email,
			'firstname' => $firstname,
			'lastname'  => $lastname,
			'username'  => $username,
			'code'      => $code,
			'active'    => 0,
			'type'      => 'Admin'
			));

		if ($user) {
			Mail::send('emails.auth.activate', array(
				'link'     => URL::route('account-set-password', $code),
				'username' => $username),
			function ($message) use ($user) {
				$message->to( $user->email, $user->username)
				->subject('Activate your account');
			}
			);
			return Redirect::route('home')
			->with('success',' Admin Account has been created !	<small> Email has been sent to set-password, and activation.</small>');
		}
	}


	//-------------------------------------------------------------------------------------------------


	// Bring up the set password for the distributors
	// Pull all the original information that The Bioss Team set
	// Set distributor status to active
	public function getSetPassword($code){

		$user = User::where('code','=', $code)->firstOrFail();
		//$distributor = $user->distributor()->first();
        $rel = DistUser::where('user_id', $user->id)->first();
        $distributor = Distributor::findOrFail($rel->distributor_id);

        $distributor->load('country');


        $id = $distributor->id;

		$addresses = $distributor->addresses()->get();
		
		foreach ($addresses as $address){
			$country = $address->country()->first();
		}

		$main_contact = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Main')->first();
		$sale_contact = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Sale')->first();
		$support_contact = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Support')->first();
		$billing_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Billing')->first();
		$shipping_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Shipping')->first();

        $billing_address->load('country');
        $shipping_address->load('country');


		$user->active = 1;

		if ($user->save()) {
			return View::make('account.set_password')
			->with('success','Set your password - and sign in !! ')
			->with('code', $code)
			->with('user', $user)
			->with('distributor', $distributor)
			->with('main_contact', $main_contact )
			->with('sale_contact', $sale_contact )
			->with('support_contact', $support_contact )
			->with('billing_address', $billing_address )
			->with('shipping_address', $shipping_address );
		}

		return Redirect::route('home')
		->with('error','We could not activate your account, please try again later.');
	}



	// Post all distributor information from getSetPassword()
	// Save those data to database
	public function postSetPassword(){

		$user = User::where('code','=', Input::get('code'))->firstOrFail();
		$code = $user->code;
        $rel = DistUser::where('user_id', $user->id)->first();
        $distributor = Distributor::findOrFail($rel->distributor_id);

		$validationRules = array(
			
			'password'          =>'required|min:6',
			'password_again'    =>'required|same:password',
			'logo_path'         =>'max:255',

			'country'           =>'required',
			'company_name'      =>'required|max:255',
			'url'               =>'max:255',                   
			
			'firstname_main'    =>'required|max:45',
			'lastname_main'     =>'required|max:45',
			'phone_main'        =>'required|max:45',
			'email_main'        =>'required|max:255',
			'title_main'        =>'max:255',

			'firstname_sale'    =>'required|max:45',
			'lastname_sale'     =>'required|max:45',
			'phone_sale'        =>'required|max:45',
			'email_sale'        =>'required|max:255',
			'title_sale'        =>'max:255',

			'firstname_support' =>'required|max:45',
			'lastname_support'  =>'required|max:45',
			'phone_support'     =>'required|max:45',
			'email_support'     =>'required|max:255',
			'title_support'     =>'max:255',
			
			'adline1_billing'   =>'required|max:255',
			'adline2_billing'   =>'max:45',
			'city_billing'      =>'max:45',
			'state_billing'     =>'max:45',
			'postcode_billing'  =>'max:45',
			'country_billing'   =>'required',
			
			'adline1_shipping'  =>'max:255',
			'adline2_shipping'  =>'max:45',
			'city_shipping'     =>'max:45',
			'state_shipping'    =>'max:45',
			'postcode_shipping' =>'max:45',
			'country_shipping'  =>''
			);


		if($user->username != Input::get('username')){
			$validationRules['username'] = 'required|unique:users,username';    
		}


		$validator = Validator::make(Input::all(), $validationRules);

		if ($validator->fails()) {
			return Redirect::to('/account/set-password/'.$user->code )
			->withErrors($validator)
			->withInput();     
		} 

		$user = User::where('code','=', Input::get('code'))->first();
		$password = Input::get('password');

		$user->password = Hash::make($password);
		$user->code   =  str_random(60);

		$user->username = Input::get('username');


		$logo_path = Input::file('logo_path');
		if (Input::hasFile('logo_path'))
		{
			$file            = Input::file('logo_path');
			$destinationPath = public_path().'/logo_path/';
			$filename        = $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $filename);
			//$user->logo_path = $filename;
            $distributor->logo_path = $filename;
		}
		$user->save();

		//$distributor = $user->distributor()->first();
		$distributor->company_name       = Input::get('company_name');
		$distributor->url                = Input::get('url');
		$distributor->country_id         = Country::where('name','=', Input::get('country'))->first()->id;


		//Logistics
		$distributor->payment_method     = Input::get('payment_method');
		$distributor->shipping_carrier   = Input::get('shipping_carrier');
		$distributor->shipping_number    = Input::get('shipping_number');

		if($distributor->payment_method == 'Shipper Paid'){
			
			$distributor->shipping_carrier = '';
			$distributor->shipping_number  = '';
		}


		$distributor->save();

		$id = $distributor->id;
		$contacts          = $distributor->contacts()->get();
		$addresses          = $distributor->addresses()->get();
		$main_contact     = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Main')->first();
		$sale_contact     = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Sale')->first();
		$support_contact  = Contact::where('distributor_id', '=', $id)->where('type', '=', 'Support')->first();
		$billing_address  = Address::where('distributor_id', '=', $id)->where('type', '=', 'Billing')->first();
		$shipping_address = Address::where('distributor_id', '=', $id)->where('type', '=', 'Shipping')->first();

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

		$shipping_address->type           = 'Shipping';
		$shipping_address->adline1        = Input::get('adline1_shipping');
		$shipping_address->adline2        = Input::get('adline2_shipping');
		$shipping_address->city           = Input::get('city_shipping');
		$shipping_address->state          = Input::get('state_shipping');
		$shipping_address->postcode       = Input::get('postcode_shipping');
		$shipping_address->distributor_id = $distributor->id;
		
			if (Input::get('country_shipping')) {
				$shipping_address->country_id = Country::where('name','=', Input::get('country_shipping'))->firstOrFail()->id;
			}
			else {
				$shipping_address->country_id = $distributor->country_id;
			}
		
		$shipping_address->save();

		$billing_address->type            = 'Billing';
		$billing_address->adline1         = Input::get('adline1_billing');
		$billing_address->adline2         = Input::get('adline2_billing');
		$billing_address->city            = Input::get('city_billing');
		$billing_address->state           = Input::get('state_billing');
		$billing_address->postcode        = Input::get('postcode_billing');
		$billing_address->distributor_id  = $distributor->id;
			
			if (Input::get('country_billing')) {
				$billing_address->country_id  = Country::where('name','=', Input::get('country_billing'))->firstOrFail()->id;
			}
			else {
				$billing_address->country_id  = $distributor->country_id;
			}
		
		$billing_address->save();

		$auth = Auth::attempt(array(
			'username' => $user->username,
			'password' => $password,
			'active' => 1
			));

		
		$user->last_logged_in = Input::get('created_at');
		$user->logged_in_count = $user->logged_in_count + 1 ;
		$user->is_online = '1';
		$user->save();

		if($auth) {


			//Send me an Email 
			Mail::send('emails.auth.test', array( 'username' => $user->username), function ($message) use ($user) {
				$message->to('sybunlongheng@gmail.com', 'Bunlong Heng')->subject( $user->username. ' has been activated !');
			});

			return Redirect::route('home')->with('success','You have been successfully logged in.');

		} 


	}

	//-------------------------------------------------------------------------------------------------

	// Bring up the set password view for internal Bioss users
	// This function activate when the user click on the activation link in their email
	// Forget-Password people will also this function
	public function getReSetPassword($code) {

		$user = User::where('code','=', $code)->firstOrFail();
		$code = $user->code;

		
		$user->active = 1;

		if($user->save()) {
			return View::make('account.reset_password')
			->with('success','Set your password and sign in.')
			->with('code', $code);
		}
		
		return Redirect::route('home')
		->with('error','We could not activate your account, please try again later.');
	}


	// Post/save uers password into database.
	// Always #hash($password)
	// Never store them as a string
	public function postReSetPassword() {

		$user = User::where('code','=', Input::get('code'))->firstOrFail();
		$code = $user->code;

		$validationRules = array(
			
			'password'       =>'required|min:6|max:60',
			'password_again' =>'required|same:password|max:60'
			);


		if($user->username != Input::get('username')){
			$validationRules['username'] = 'required|unique:users,username';    
		}


		$validator = Validator::make(Input::all(), $validationRules);


		if ($validator->fails()) {
			return Redirect::to('/account/reset-password/'.$code)
			->withErrors($validator)->withInput();
		}

		if($user->username != Input::get('username')){
			$user->username = Input::get('username');    
		}
		
		$password = Input::get('password');
		$user->password = Hash::make($password);
		
		$user->code   = str_random(60);
		

		if ($user->save()) {
			return Redirect::route('account-sign-in-post')
			->with('success','Your password has been set successfully!');
		}

	}

	//-------------------------------------------------------------------------------------------------


	// Log the current user out
	// There is no need for postSignOut function
	public function getSignOut() {
		

		$user = Auth::user();
		$user->last_logged_out = Input::get('created_at');
		$user->is_online = '0';
		$user->save();


		Auth::logout();


		return Redirect::to('/account/sign-in')
		->with('success'," You have been successfully logged out.");
	}


	//-------------------------------------------------------------------------------------------------

	// Bring up the chnage password view to allow user to change their password
	public function getChangePassword() {
		return View::make('account.change_password')
		->with('success'," Password must have minimum of 6 characters");
	}

	
	// Check to see if the old password is match
	// Check to see if the password and the password again is also matched
	// Save the new one to the database
	public function postChangePassword(){
		$validator = Validator::make( Input::all(), array(
			'old_password'   =>'required',
			'password'       =>'required|min:6',
			'password_again' =>'required|same:password'
			));
		if ($validator->fails()) {
			return Redirect::route('account-change-password')
			->withErrors($validator);
		}

		$user           = User::find(Auth::user()->id);
		$distributor    = $user->distObj();
		$old_password   = Input::get('old_password');
		$password       = Input::get('password');
		$password_again = Input::get('password_again');
			// If the password match
		if (Hash::check($old_password,$user->getAuthPassword())) {
			// Set the old password to the new password and update the
			$user->password = Hash::make($password);
			if ($user->save()) {
				if(Auth::user()->type            =='Bioss' OR Auth::user()->type            =='Admin' ){
					return Redirect::to('/users/'. Auth::id())
					->with('success','Your password has been changed !');
				}else{
					return Redirect::to('/distributors/'.$distributor->id)
					->with('success','Your password has been changed !');
				}



			}
		}
		else {
			return Redirect::route('account-change-password')
			->with('error','Your old password is incorrect');
		}

		return Redirect::route('account-change-password')
		->with('error','Your Password could not be changed.!');
	}

	//-------------------------------------------------------------------------------------------------


	// Bring up the forgot password view
	public function getForgotPassword() {
		return View::make('account.forgot_password')
		->with('success',' Enter your email !');
	}


	// Allow the user recover their password
	// Let them enter their registed email
	// Send them an activation link
	// Redirect to set-password view        
	public function postForgotPassword() {

		$validator = Validator::make(Input::all(), 
			array(
				'email' => 'required|email'

				));

		if ($validator->fails()) {
			return Redirect::route('account-forgot-password')
			->withErrors($validator)
			->withInput();

		} else {

			$user = User::where('email','=',Input::get('email'));

			if ($user->count()) {

				$user                = $user->first();
				$user->code          = str_random(60);
				$user->save();

				if ($user) {

					Mail::send('emails.auth.forgot_password', array('link'=> URL::route('account-reset-password', $user->code),'username' => $user->username),
						function ($message) use ($user) {$message->to( $user->email, $user->username)->subject('Reset your password');
					});

					return Redirect::to('/account/sign-in')
					->with('success','An email has been sent to you to reset your password.');

				}
			}

		}
		return Redirect::route('account-forgot-password')

		->with('error',"We can't find an email matching the information you provided.");

	}


}
