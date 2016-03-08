<?php namespace App\Http\Controllers;

use Hash;
use Auth;
use Request;
use App\User;
use App\Negocio;
use App\Fotos;
use App\NegocioRubro;
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
	public function viewStore()

	{     



	$provincias=DB::select('select * from provincias');

	$ciudades=DB::select('select * from ciudades where  idProvinciaF=1 '); 
  $rubros=DB::select('select * from rubros');
  $entidades=DB::select('select * from entidades');



		return view("Negocio.negocioViewStore")->with('provincias', $provincias)->with('ciudades',$ciudades)->with('rubros',$rubros)->with('entidades',$entidades);
	}


	
   public function store()
   {


   	   $negocio=new Negocio();
       
   	   $negocio->razonSocial=Request::get('razonSocial');
   	   $negocio->direccion=Request::get('direccion');
   	   $negocio->idProvinciaF=Request::get('provincia');
   	   $negocio->idCiudadF=Request::get('ciudad');
   	   $negocio->sitioWeb=Request::get('sitioWeb');
   	   $negocio->telefono=Request::get('telefono');
   	   $negocio->entidad=Request::get('entidad');
   	   $negocio->estado=Request::get('estado');
   	   $negocio->latitud=Request::get('latitud');
   	   $negocio->longitud=Request::get('longitud');
   	   $negocio->save();
        
        //obtener el id del negocio que fue insertado//

   
   	    $id=DB::table('negocios')->max('idNegocio');


   	  
       //pregunto si existe las fotos para su posterior proceso
   	     if(isset($_FILES['fotos']['name']))
   	    {



   	   //carga las fotos en  un array y genera las url.

     						  foreach ( $_FILES['fotos']['name'] as $name)
							{
								 	$url[]='public/img/negocio/'.rand(1,5000).$name;
							}



			//carga la direccion temporal para luego mover las imagenes a la url public/img/negocio/		
   
   				 foreach ( $_FILES['fotos']['tmp_name'] as $tmp )
				{
					$temp[]=$tmp;
				}

               // var_dump($url)or die();
                
				 $cant=count($url);//obtengo la cantidad de url que necesito//
				 

				 for($i=0;$i<$cant;$i++)
				{
			
          				move_uploaded_file($temp[$i],'.../../../'.$url[$i]);
          				$foto=new Fotos();
						$foto->idNegocioF=$id;
						$foto->url=$url[$i];
						$foto->save();
                 }


            
         }//end if


                      /*almacena rubros*/

                        $rubros=Request::get('rubro');

                        //var_dump($r)or die();

                        $cantRubros=count($rubros);

  						
  						for($i=0;$i<$cantRubros;$i++){
  							

  							$negocioRubro= new NegocioRubro();

  							$negocioRubro->idNegocioF=$id;
  							$negocioRubro->idRubroF=$rubros[$i];
  							$negocioRubro->save();



  						}
















   	   //var_dump($id)or die();

       return redirect::route('negocioViewStore');



   }//end stored











}//end controller