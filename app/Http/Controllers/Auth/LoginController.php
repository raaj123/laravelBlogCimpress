<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use URL,Input;
use Validator;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function showLoginForm(){
		return view('auth.login');
	}
	
	public function login(Request $request){
		/* $userEmail = $request['email'];
		$qry = User::where('email','=',$userEmail)->first();
		
		if(! \Hash::check($request['password'] , $qry->password  )){
			return URL::to('/home')
			->with('message', 'Current Password Error !')
			->withInput();
		}else{
			return \Redirect::route('home')->with( ['data' => $request] );
                        
		} */
		
		$rules = array(
			'email' => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:5');
 
			// password has to be greater than 3 characters and can only be alphanumeric and);
			// checking all field
 
			$validator = Validator::make($request->all() , $rules);
 
			// if the validator fails, redirect back to the form
 
			if ($validator->fails())
				{
				return \Redirect::to('login')->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
				}
			  else
				{
				// create our user data for the authentication
 
				$userdata = array(
					'email' => Input::get('email') ,
					'password' => Input::get('password')
				);
 
				// attempt to do the login
				$userEmail = $request['email'];
				$qry = User::where('email','=',$userEmail)->first();
				$userName = $qry->name;
				//echo "<pre>";print_r($qry);die;
				if(! \Hash::check($request['password'] , $qry->password  )){
					return \Redirect::route('home')->with( ['message' => 'error'] );
				}else{
					session(['userEmail' => $userEmail]);
					session(['userName' => $userName]);
					return \Redirect::route('home')->with( ['data' => $userdata] );
								
				}
					
				}
			
		
		
	}
	
	
	
}
