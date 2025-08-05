<?php

class UserController extends BaseController {

	// Bring up Bioss user index view
	public function index(){
		
		$users = User::where('type','!=','Distributor')
			->orderBy('group', 'asc')
			->paginate(20);

		
		return View::make('users.index')
			->with('users',$users);
		
	}

	//-------------------------------------------------------------------------------------------------

	// Bring up create form for Bioss user
	public function create(){
		return View::make('users.create');
	}

	//-------------------------------------------------------------------------------------------------
	

	// Store Bioss User into the database
	public function store()
	{
		$validator = User::validator(Input::all());

		if ($validator->fails()) {
			return Redirect::to('users/create')
			->withErrors($validator)
			->withInput(Input::except('logo_path'));

		} else {

			$user                = new User;

			$user->firstname = Input::get('firstname');
			$user->lastname  = Input::get('lastname');
			$user->username  = Input::get('username');
			$user->email     = Input::get('email');
			$user->group     = Input::get('group');
			$user->type      = Input::get('type');

			$user->code      = str_random(60);
			$user->active    = 0;


			$logo_path = Input::file('logo_path');

			if (Input::hasFile('logo_path'))
			{

				$file            = Input::file('logo_path');
				$destinationPath = base_path().'/app/files/logo_path/';
				$filename        = $file->getClientOriginalName();
				$extention       = $file->getClientOriginalExtension();
				$uploadSuccess   = $file->move($destinationPath, $filename);
				$user->logo_path = $filename;
			}

			$user->save();

			// Email Activation 
			if ($user) {

				Mail::send('emails.auth.activate_internal', array(
					'link'     => URL::route('account-reset-password', $user->code),
					'username' => $user->username, 'firstname' => $user->firstname, 'code' => $user->code ),

				function ($success) use ($user) {
					$success->to( $user->email, $user->username)
					->subject('Activate your account');
				}


				);

				$user->send_invitation = $user->send_invitation + 1 ; 
				$user->save();

				$name = ucfirst($user->firstname).' '.ucfirst($user->lastname);
				
				$log          = new ActivityLog;
				$log->action  = "Store";
				$log->object  = "User";
				$log->name    = $name;
				$log->user    = Auth::user()->username;
				$log->user_id = Auth::user()->id;
				$log->save(); 

				
				return Redirect::to('/users/')
				->with('work',' Bioss Account for <b class ="cool-green">'. 
					ucfirst($user->firstname).' '. ucfirst($user->lastname). '</b> has been created !
					<small> Email has been sent to set-password, and activation.</small>');

			}

		}
	}

	//-------------------------------------------------------------------------------------------------

	// Show the details of a user
	public function show($id){

		$user = User::findOrFail($id);

		return View::make('users.show')
		->with('user', $user);
	}

	//-------------------------------------------------------------------------------------------------

	// Bring up edit user form
	public function edit($id){
		
		//get the user
		$user = User::findOrFail($id);
		return View::make('users.edit')
		->with('user', User::find($id));
	}

	//-------------------------------------------------------------------------------------------------


	public function invite($id){

		$user = User::findOrFail($id);
		
		
		Mail::send('emails.auth.activate_internal', array(
			'link'     => URL::route('account-reset-password', $user->code),
			'username' => $user->username, 'firstname' => $user->firstname ),
		function ($message) use ($user) {
			$message->to( $user->email, $user->username)
			->subject('Welcome To Bioss Distributor Website');
		}
		);
		
		$user->send_invitation = $user->send_invitation + 1 ; 
		$user->save();

		$name = ucfirst($user->firstname).' '.ucfirst($user->lastname);


		return Redirect::to('/users/')
		->with('email',' Invitation has been sent to <b class ="cool-blue">'. $name.
			'</b> ( <span class="blue">'.$user->email.'</span> ) <small> to set-password, and activation.</small>');
	}

	//-------------------------------------------------------------------------------------------------

	
	// Update the user information
	public function update($id){

		$validation = User::validator(Input::all(), $id);

		// Validate
		if ($validation->fails()) {
			
			return Redirect::to('users/'. $id . '/edit')->withErrors($validation);

		} else {
			
			
			$user            = User::findOrFail($id);
			$user->firstname = Input::get('firstname');
			$user->lastname  = Input::get('lastname');
			$user->username  = Input::get('username');
			$user->email     = Input::get('email');
			$user->group     = Input::get('group');
			$user->type      = Input::get('type');

			
			$logo_path = Input::file('logo_path');

			// File Input
			if (Input::hasFile('logo_path'))
			{

				$file            = Input::file('logo_path');
				$destinationPath = base_path().'/app/files/logo_path/';
				$filename        = $file->getClientOriginalName();
				$extention       = $file->getClientOriginalExtension();
				$uploadSuccess   = $file->move($destinationPath, $filename);
				$user->logo_path = $filename ;
			}

			$user->save();

			$name = ucfirst($user->firstname).' '.ucfirst($user->lastname);

				$log          = new ActivityLog;
				$log->action  = "Update";
				$log->object  = "User";
				$log->name    = $name;
				$log->user    = Auth::user()->username;
				$log->user_id = Auth::user()->id;
				$log->save(); 
			
			return Redirect::to('/users/')
				->with('work','The user <b class ="cool-green">'.$name. '</b> was updated succesfully!');
		}
	}

	//-------------------------------------------------------------------------------------------------
	

	// Delete Bioss User OR Distributor
	// I use the same function for both user type
	public function destroy($id){
		
		//get the user
		$user = User::find($id);
		
	
		if( $user->distributor()->first() ){ 
			$distributor = $user->distributor()->first();
			
		}

		$user->delete();
		$success = File::delete(base_path().'/app/files/logo_path/'.$user->logo_path);

		if($user->type == 'Distributor'){

			$name = ucfirst($distributor->company_name);

		}else{
			$name = ucfirst($user->firstname).' '.ucfirst($user->lastname);
		}

				$log          = new ActivityLog;
				$log->action  = "Delete";
				$log->object  = "User";
				$log->name    = $name;
				$log->user    = Auth::user()->username;
				$log->user_id = Auth::user()->id;
				$log->save(); 

		

		// Give Admin user a feedback on who they just deleted
		// I find that really useful
		// Rather than just display "user was deleted succesfully!"
		// Base on their user type the alert message will be slightly different
		if($user->type == 'Distributor'){
			
			return Redirect::to('/distributors/')
			->with('work','The distributor <b class ="cool-green">'. 
				ucfirst($distributor->company_name).'</b> was deleted succesfully!');

		}else {

			return Redirect::to('/users/')
			->with('work','The user <b class ="cool-green">'.$name. '</b> was deleted succesfully!');

		}

	}

}
