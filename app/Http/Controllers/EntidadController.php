<?php namespace App\Http\Controllers;

use Hash;
use Auth;
use Request;
use App\User;
use App\Negocio;
use App\Fotos;
use App\Rubro;
use App\Entidad;
use Redirect;
use DB;
use Session;
use Exception;

class EntidadController extends Controller {

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

      $entidades=DB::select('select * from entidades');

      return view('Entidad.indexEntidad')->with('entidades',$entidades);


}


public  function store(){
  
 try{
      $entidad=new Entidad();
      $entidad->nombre=Request::get('nombre');
      $entidad->sigla=Request::get('sigla');
      $entidad->save();
 	 return Redirect::route('indexEntidad')->withFlashMessage('La Entidad Se Creo Correctamente.');
    }catch(Exception $e){

     return Redirect('crearEntidad')->withFlashMessage('La Entidad Ya Existe Ingrese Otro Nombre.');
    }



	
}


public  function entidadEdit($id){


$datos =DB::select("select * from entidades where idEntidad={$id}");


return view('Entidad.editEntidad')->with('datos',$datos)->withFlashMessage('La Entidad Ya Existe !!Ingrese Otro Nombre!!');
	
}

public  function entidadEditStore(){

	try{
			$idEntidad=Request::get('idEntidad');
			$nombre=Request::get('nombre');
			$sigla=Request::get('sigla');

			DB::table('entidades')
			            ->where('idEntidad', $idEntidad)
			            ->update(array('nombre' => $nombre ,'sigla'=>$sigla));

			return Redirect::route('indexEntidad');
		}catch(Exception $e){

			return Redirect::route('entidadEdit',$idEntidad)->withFlashMessage('La Entidad Ya Existe !!Ingrese Otro Nombre!!');
		}


	
}








public  function deleteEntidad($id){

DB::table('entidades')->where('idEntidad', '=', $id)->delete();

return Redirect::route('indexEntidad')->withFlashMessage('La Entidad Se a Eliminado.');
}








}//end controller