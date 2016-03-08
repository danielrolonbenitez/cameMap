<?php namespace App\Http\Controllers;

use Hash;
use Auth;
use Request;
use App\User;
use App\Negocio;
use App\Fotos;
use App\Rubro;
use Redirect;
use DB;
use Exception;


class RubroController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	

public  function index(){

      $rubros=DB::select('select * from rubros');

      return view('Rubro.indexRubro')->with('rubros',$rubros);


}


public  function store(){
  
 try{
      $rubro=new Rubro();
      $rubro->nombre=Request::get('nombre');
      $rubro->save();
	 return Redirect::route('indexRubro')->withFlashMessage('El Rubro Se Creo Correctamente.');
	}catch(Exception $e){

		return Redirect('crearRubro')->withFlashMessage('EL Rubro Ya Existe Ingrese Otro Nombre.');

	}
	
}


public  function rubroEdit($id){


$datos =DB::select("select * from rubros where idRubro={$id}");


return view('Rubro.editRubro')->with('datos',$datos);
	
}

public  function rubroEditStore(){
try{
	$idRubro=Request::get('idRubro');
	$nombre=Request::get('nombre');

	DB::table('rubros')
	            ->where('idRubro', $idRubro)
	            ->update(array('nombre' => $nombre));
	return Redirect::route('indexRubro')->withFlashMessage('El Rubro Se a Creado');
	}catch(Exception $e){

		return Redirect::route('rubroEdit',$idRubro)->withFlashMessage('El Rubro Ya Existe !!Ingrese Otro Nombre!!');
	}
	









}








public  function deleteRubro($id){

DB::table('rubros')->where('idRubro', '=', $id)->delete();

return Redirect::route('indexRubro')->withFlashMessage('Rubro Se a Eliminado.');
}








}//end controller