<?php

use Lib\Validation\UserLoginValidator as UserLoginValidator;

class AuthController extends BaseController {

    protected $login_validation;

	public function __construct(UserLoginValidator $login_validation)
	{
		parent::__construct();
		$this->login_validation = $login_validation;
	}

	public function getLogin()
	{
		return View::make('auth.login', array('class' => 'login'));
	}

	public function postLogin()
	{
		if ($this->login_validation->fails()) {
		  return Redirect::to('auth/login')
		  ->withErrors($this->login_validation->errors())
		  ->withInput();
		} else {
			$user = array(
				'pseudo' => Input::get('pseudo'), 
				'password' => Input::get('password')
			);
			if(Auth::attempt($user, Input::get('souvenir'))) {
				return Redirect::intended('/');
			}
		    return Redirect::to('auth/login')
		    ->with('pass', 'Le mot de passe n\'est pas correct !')
		    ->withInput();
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}