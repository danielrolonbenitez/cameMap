<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

//Route::get('home', 'HomeController@index');

//Route::controllers([
	//'auth' => 'Auth\AuthController',
	//'password' => 'Auth\PasswordController',
//]);

Route::get('/', 'LoginController@index');
Route::post('/validaUser', 'LoginController@validaUser');


Route::get('registrarse',function(){

 return view('Login/registrarse');
});
Route::post('/registerUser', 'LoginController@registerUser');

//begin negocio//

Route::get('negocio','NegocioController@index');
