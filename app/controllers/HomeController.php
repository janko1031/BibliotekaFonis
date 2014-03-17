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


		public function prikaziHome()
	{
		$content='app'.'.'.'home';
		
		$title="Pocetna";
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
			}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('user', Auth::user());
	}		

	public function prikaziError()
	{
		$title="Error";
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
			}	
		else return View::make('layouts.error')->with('title',$title);
	}
	public function prikaziSuccess()
	{
		$title="Success";

 	if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
			}	
		else return View::make('layouts.success')->with('title',$title);
	}
	public function prikaziNoAccess()
	{
		$title="Access Denied";
		$content='layouts'.'.'.'noAccess';
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');

			}	
		return	View::make('template')->with('title',$title)->with('content',$content)->with('user', Auth::user());
	}


		
}