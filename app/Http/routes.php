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


/*panel y validacion por login*/
Route::get('/', 'LoginController@index');
Route::post('/validaUser', [ 'as'=>'validaUser' ,'uses'=>'LoginController@validaUser']);


/*panel y validacion  de  registro*/
Route::get('registrarse',function(){return view('Login/registrarse');});
Route::post('/registerUser',['as'=>'registerUser', 'uses'=>'LoginController@registerUser']);

//begin negocio//

//verifica que el usuario este autenticado para poder ver la vista negocio
Route::group(['middleware' => 'auth'], function()
{
Route::get('negocio','NegocioController@index');

});


//devuelve por ajax la ciudad segun la provincia seleccionada//
Route::get('ajaxCiudad', function()
{
   $id=$_GET['valor'];

$datos=DB::table('ciudad')->where('provincia_id',$id)->get();

    
   return $datos;
});











Route::get('logout','Auth\AuthController@getLogout');
