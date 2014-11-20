<?php

class AuthController extends \BaseController {

	protected $route = '/auth';

	public function getIndex(){

		if( Auth::check() ):

			return Redirect::to('/dashborad');

		else:

			return Redirect::to( $this->route . '/login' );

		endif;

	}

	public function getLogin(){

		$error =  Session::get('error');

		$array = array(
			'error' => $error
			);

		return View::make ('auth.login')->with($array); 

	}

	public function postLogin(){
		$credenciales = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);
		if(Auth::attempt($credenciales)):

			return Redirect::to('/employees');

		else:

			$array = array(
				'error' => 'Usuario o clave Inválida'
				);

			return Redirect::to( $this->route . '/login' )->with($array);

		endif;
	}

	public function getLogout(){

		Auth::logout();
		return Redirect::to( $this->route . '/login' );

	}

}