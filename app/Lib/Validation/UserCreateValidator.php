<?php namespace Lib\Validation;

class UserCreateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'pseudo' => 'required|max:30|alpha|unique:users',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:8|same:Confirmation_mot_de_passe',
		);
	}

}