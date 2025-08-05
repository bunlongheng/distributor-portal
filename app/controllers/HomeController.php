<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	

	// Control behavior after the user log-in
	public function home()
	{




		// For internal Bioss users bring them to distributors list 'list view'
		// The Bioss Team, Accounting, Order Team like 'list view' better
		// If you want to change back the continent view just modify the URL to /distributors
		if (Auth::check()) {

			if (Auth::user()->type !== 'Distributor')

				return Redirect::to('/distributors/list_view')
					->with('work','Hi, <b> '. Auth::user()->firstname.'</b> - you have been successfully logged in.');

			else
				// For distributor bring them to dashboard
				return View::make('dashboard')
					->with('success','You have been successfully logged in.');

		}


		// Otherwise, redirect them back to the sign-in page
		else
			return Redirect::route('account-sign-in');

	}

	// Bring up my dashboard
	public function dashboard()
	{
		return View::make('dashboard');
	}


	// Bring up a certain view when user click on the dashboard link
	public function comingsoon()
	{
		return View::make('errors.comingsoon');
	}
	public function comingsoon_gift()
	{
		return View::make('errors.comingsoon_gift');
	}
	public function comingsoon_newsletter()
	{
		return View::make('errors.comingsoon_newsletter');
	}
	public function comingsoon_marketing_material()
	{
		return View::make('errors.comingsoon_marketing_material');
	}



	// Provide me a quick access of phpinfo()
	// I find this really convinience while developing
	// Don't worry, Only developer can access this route.
	public function phpinfo()
	{
		return View::make('phpinfo');
	}


	// Bring up my summary page
	public function summary()
	{
		return View::make('summary');
	}

	// Summary + Recent Activity
	public function activity()
	{
		return View::make('activity')
			->with('logs', ActivityLog::orderBy('created_at', 'desc')->paginate(40));
	}


	// These 10 functions are for my testing zone

	public function test1()
	{
		return View::make('tests.1');
	}
	public function test2()
	{
		return View::make('tests.2');
	}
	public function test3()
	{
		return View::make('tests.3');
	}
	public function test4()
	{
		return View::make('tests.4');
	}
	public function test5()
	{
		return View::make('tests.5');
	}
	public function test6()
	{
		return View::make('tests.6');
	}
	public function test7()
	{
		return View::make('tests.7');
	}
	public function test8()
	{
		return View::make('tests.8');
	}
	public function test9()
	{
		return View::make('tests.9');
	}
	public function test10()
	{
		return View::make('tests.10');
	}


	


}
