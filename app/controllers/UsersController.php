<?php

class UsersController extends BaseController {

	protected $layout = "layouts.main";

        protected $user;   
      
           
            
     
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getDashboard')));

           
	}

	public function getRegister() {
		$this->layout->content = View::make('app.registracija')->with('title', 'Registacija');;
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));		
			
			$user->save();
			$user->roles()->attach(2); 

			return Redirect::to('users/login')->with('message', 'Thanks for registering!');
		} else {
			return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function getLogin() {
		$title="Pocetna";
		$this->layout->content = View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu');
	}

	public function postSignin() {
		$title="Pocetna";
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('home')->with('title',$title)->with('message', 'You are now logged in!')->with('user', Auth::user());
		} else {
			$title="Login";
			/*return Redirect::to('users/login')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();*/
			$this->layout->content = View::make('users.login')->with('title',$title)->with('message', 'Your username/password combination was incorrect');	
		}
	}

	public function getDashboard() {
		$this->layout->content = View::make('home');
	}

	public function getLogout() {
		Auth::logout();
		
		return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}
	public function prikaziProfil()
	{
		$title="Profil korisnika ".Auth::user()->username;
		$content='admin'.'.'.'profil';
		
		$zaduzenje = new Zaduzenje();
		$zaduzenja=$zaduzenje->zaduzenjaKorisnika(Auth::user()->id);
		
		$komentar = new Komentar();
		$komentari=$komentar->komentariKorisnika(Auth::user()->id);
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('zaduzenja',$zaduzenja)->with('komentari',$komentari)->with('title',$title)->with('content',$content)
			->with('user', Auth::user());
	}
	
}