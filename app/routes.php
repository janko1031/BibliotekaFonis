<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

	
	


Route::get('/spisakKnjiga', 'HomeController@prikaziKnjige');

Route::controller('users', 'UsersController');
Route::get('/', 'UsersController@getLogin');

/* Route::get('/', function()
 {
	Schema::create('zaduzenja2', function($table)
 {
 	$table->increments('id');


 $table->integer('knjiga_id');
 $table->integer('user_id');

 $table->timestamps();

 });
 });*/
Route::post('login', array('before' => 'guest|csrf', function()
{
	if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
	{
		return Redirect::route('home');
	}
	
	return View::make('login')->with('error', true);
}));

Route::get('/users/logout', 'UsersController@getLogout');
Route::get('/home', 'HomeController@prikaziHome');
Route::get('/error', 'HomeController@prikaziError');
Route::get('/success', 'HomeController@prikaziSuccess');

Route::get('/unos', 'KnjigeController@prikaziUnos');
Route::get('/azuriranje', 'KnjigeController@prikaziAzuriranje');
Route::get('/zaduzenja', 'KnjigeController@prikaziZaduzenja');
Route::get('/spisakKnjiga', 'KnjigeController@prikaziKnjige');
Route::get('/delete', 'KnjigeController@prikaziDelete');
Route::get('/knjiga', 'KnjigeController@prikaziKnjigu');
Route::get('/katalogKnjiga', 'KnjigeController@prikaziKatalog');
Route::get('/profil', 'UsersController@prikaziProfil');

Route::post('/delete', 'KnjigeController@obrisiKnjigu');
Route::post('/knjiga', 'KnjigeController@unesiKomentar');
Route::post('/komentar', 'KnjigeController@izbrisiKomentar');
Route::post('/unos', 'KnjigeController@uradiUnos');
Route::post('/azuriranje', 'KnjigeController@uradiAzuriranje');
Route::post('/zaduzenja', 'KnjigeController@dodajZaduzenje');
Route::post('/profil', 'KnjigeController@razduziKnjigu');

Route::resource('posts', 'PostsController');