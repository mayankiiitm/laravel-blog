<?php
class AccountController extends BaseController{
	 
	 public function getSignIn(){

	 	return View::make('account.signin');
	 }

	 public function postSignIn(){
	 	$validator=Validator::make(Input::all(),
	 		array(
	 			'email'=>'required|email',
	 			'password'=>'required'

	 		)
	 	);

	 	if($validator->fails()){
	 		return Redirect::route('account-sign-in')
	 			   ->withErrors($validator)
	 			   ->withInput();
	 	} else {

	 		$auth=Auth::attempt(array(
	 			'email'=>Input::get('email'),
	 			'password'=>Input::get('password'),
	 			'active'=>1
	 			));

	 		if($auth){
	 			return Redirect::intended('/');
	 		} else {

	 			 return Redirect::route('account-sign-in')
	 		   		->with('global','Email/Password wrong');
	 		   	}
	 	}
	 	
	 	return Redirect::route('account-sign-in')
	 		   ->with('global','Have you activated your account');

	 }

	 

	 public function getSignOut (){
	 	Auth::logout();
	 	return Redirect::route('home');

	 }








	 public function getCreate(){
	 return View::make('account.create');
	 }

	 public function postCreate(){
	 	$validator= Validator::make(Input::all(),
	 		array(
	 			'email'=>'required|max:50|email|unique:users',
	 			'username'=>'required|max:20|min:3|unique:users',
	 			'password'=>'required|min:6',	
				'password_again'=>'required|same:password'
	 			)
	 		);
	 	if($validator->fails()){
	 		return Redirect::route('account-create')
	 		->withErrors($validator)
	 		->withInput(); 
	 	
	 	} else{

	 		$email = Input::get('email');
	 		$username = Input::get('username');
	 		$password = Input::get('password');
	 		$code = str_random(60);

	 		$user = User::create(array(

	 			'email'=> $email,
	 			'username'=>$username,
	 			'password'=>Hash::make($password),
	 			'active'=>0,
	 			'code' =>$code
				));

	 		if($user){

	 			Mail::send('emails.auth.activate',array('link'=>URL::route('account-activate',$code),'username'=>$username),function($message) use ($user){
	 				$message->to($user->email,$user->username)->subject('Activate your account');
	 			});

	 			return Redirect::route('home')
	 				   ->with('global','Your account has been created! Check your mail to activate your account ');
	 		}
	 	}
	}
 
	public function getActivate ($code){
		$user = User::where('code','=',$code)->where('active','=',0);
		if($user->count()){
			$user = $user->first();

			$user->active=1;
			$user->code='';

			if($user->save()){
				return Redirect::route('home')
					   ->with('global','Activated! You can now sign in!');
			}
		}

		return Redirect::route('home')
			   ->with('global','We could not activate your account. Try again later.');
	}

}