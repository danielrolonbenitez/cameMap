<?php namespace App\Http\Controllers;

use Hash;
use Auth;
use Request;
use App\User;
use Redirect;

class LoginController extends Controller {

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
		return view("Login.loginIndex");
	}


	public function validaUser()

	{			
			 $email = Request::input('email');
        	$password = Request::input('password');

	
			  if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {            
            
            
                return redirect::route('negocioViewStore');
                        
 
		}else {  return "no validado";}


}


public function registerUser()

	{			
		$user = new User();
        $user->nombre= Request::get('nombre');
        $user->email = Request::get('email');
        $user->password = Hash::make(Request::get('password'));
        $user->rol=1;

        $user->save();

	  return redirect('/');
		


}












}//end controller