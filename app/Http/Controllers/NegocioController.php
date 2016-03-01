<?php namespace App\Http\Controllers;

use Hash;
use Auth;
use Request;
use App\User;
use Redirect;
use DB;

class NegocioController extends Controller {

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
	public function index()

	{     

		//$cant=1;
       //$resultado=isset($_GET['valor']);
       

		//$cant=self::ajax();


	$provincias=DB::select('select * from provincias');

	$ciudades=DB::select('select * from ciudad where  provincia_id=1 ');




		return view("Negocio.index")->with('provincias', $provincias)->with('ciudades',$ciudades);
	}


	










}//end controller