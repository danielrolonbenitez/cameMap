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


/*vista y validacion pora login*/
Route::get('/', 'LoginController@index');
Route::post('/validaUser', [ 'as'=>'validaUser' ,'uses'=>'LoginController@validaUser']);


/*vista y validacion  para registro*/
Route::get('registrarse',function(){return view('Login/registrarse');});
Route::post('/registerUser',['as'=>'registerUser', 'uses'=>'LoginController@registerUser']);

//begin negocio//

//verifica que el usuario este autenticado para poder ver la vista negocio
Route::group(['middleware' => 'auth'], function()
{

 /*begin negcio*/
Route::get('negocioRegister',['as'=>'negocioViewStore' ,'uses'=>'NegocioController@viewStore']);

Route::post('negocioStore',['as'=>'negocioStore','uses'=>'NegocioController@store']);
 /*end negocio*/

/*begin rubro*/

Route::get('rubro',['as'=>'indexRubro','uses'=>'RubroController@index']);

Route::get('crearRubro', function(){return view('Rubro.createRubro');});
Route::post('storeRubro',['as'=>'storeRubro','uses'=>'RubroController@store']);
Route::get('rubroEdit/{id}',['as'=>'rubroEdit','uses'=>'RubroController@rubroEdit']);
Route::post('rubroEditStore',['as'=>'rubroEditStore','uses'=>'RubroController@rubroEditStore']);

Route::get('rubroDelete{id}',['as'=>'rubroDelete','uses'=>'RubroController@deleteRubro']);



/*end rubro*/



/*begin entidad*/
Route::get('entidad',['as'=>'indexEntidad','uses'=>'EntidadController@index']);
Route::get('crearEntidad', function(){return view('Entidad.createEntidad');});
Route::post('storeEntidad',['as'=>'storeEntidad','uses'=>'EntidadController@store']);
Route::get('entidadEdit/{id}',['as'=>'entidadEdit','uses'=>'EntidadController@entidadEdit']);
Route::post('entidadEditStore',['as'=>'entidadEditStore','uses'=>'EntidadController@entidadEditStore']);

Route::get('entidadDelete{id}',['as'=>'entidadDelete','uses'=>'EntidadController@deleteEntidad']);

/*end entidad*/


});/*end middleware*/


//devuelve por ajax la ciudad segun la provincia seleccionada//
Route::get('ajaxCiudad', function()
{
   $id=$_GET['valor'];

$datos=DB::table('ciudades')->where('idProvinciaF',$id)->get();

    
   return $datos;
});






















Route::get('logout','Auth\AuthController@getLogout');
