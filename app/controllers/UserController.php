<?php

class UserController extends \BaseController {

	protected $route = '/users';

	public function getIndex(){

		$modelo = Users::all();

		$array = array(
			'users' => $modelo,
			'route' => $this->route
			);

		return View::make('users.index')->with($array);

	}
	public function getCreate(){

		return View::make('users.create');

	}
	public function postCreate(){

		if(Input::get('password') === Input::get('password_2')):

			$user = new Users();
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->username = Input::get('username');
			$user->password = Input::get('password');
			$user->email = Input::get('email');
			$user->type = Input::get('type');
			$user->status = 'draft';
			$user->save();

			return Redirect::to('/users');

		else:

			$array = array(
				'error' => 'password_error',
				'user' => Input::all()
				);
 
			return View::make('users.create')->with($array);

		endif;

	}
	
	public function getEdit( $id = '' ){

   		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$user = Users::find($id);

			$array = array(
				'user' => $user,
				'route' => $this->route
				);

			return View::make('users.edit')->with($array);

		else:

			return Redirect::to($this->route);

		endif;

	}

	
	public function postEdit( $id = '' ){

   		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$user = Users::find($id);

			if( Input::get('password') != '' ):
				
				if( Input::get('password') == Input::get('password_2')):
				
					$user->password = Hash::make(Input::get('password'));
				
				else:

					$array = array(
						'error' => 'clave_error',
						'route' => $this->route,
						'user' => $user
						);
		 
					return View::make('users.edit')->with($array);
				
				endif;
			
			endif;

			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');

			$user->save();

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

	}

	public function getDelete( $id ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$user = Users::find($id);

			$array = array(
				'user' => $user,
				'route' => $this->route
				);	

			return View::make('users.delete')->with( $array );

		else:

			return Redirect::to($this->route);
		endif;
	}
   
   public function postDelete($id = '' ){

   		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$user = Users::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

   }

}