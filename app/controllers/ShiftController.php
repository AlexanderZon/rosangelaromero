<?php

class ShiftController extends \BaseController {

	protected $route = '/shifts';

	public function getIndex()
	{
		$shifts = Shifts::noFaults();

		$array = array(
			'shifts' => $shifts,
			'route' => $this->route
		);

		return View::make('shifts.index')->with($array);

	}

	public function postIndex()
	{

		$desde = Input::get('desde');
		$from = Input::get('hasta');
		$municipio = Input::get('municipio');

		$shifts = Shifts::noFaults();

			$array = array(
			'shifts' => $shifts,
			'route' => $this->route
			);

		return View::make('shifts.index')->with($array);

	}

	public function getCreate()
	{
		$array = array(
			'route' => $this->route,
		);

		return View::make('shifts.create')->with( $array );

	}
	public function postCreate(){

		$shift = new Shifts();
		$shift->title = Input::get('title');
		$shift->prefix = Input::get('prefix');
		$shift->hours = Input::get('hours');
		$shift->fault = false;

		$shift->save();

		return Redirect::to($this->route);

	}

	public function getEdit( $id ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$shift = Shifts::find($id);

			$array = array(
				'route' => $this->route,
				'shift' => $shift,
				);	

			return View::make('shifts.edit')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;

	}
	
	public function postEdit( $id = '' ){

		$id = Crypt::decrypt($id);
		$shift = Shifts::find($id);
	    $shift->title = Input::get('title');
	    $shift->prefix = Input::get('prefix');
		$shift->hours = Input::get('hours');
		$shift->fault = false;

		$shift->save();
		
		return Redirect::to($this->route);

	}

	public function getDelete( $id ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$shift = Shifts::find($id);

			$array = array(
				'shift' => $shift,
				'route' => $this->route
				);	

			return View::make('shifts.delete')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;

	}
   
   public function postDelete($id = '' ){

   	if( $id != '' ):

			$id = Crypt::decrypt($id);
			$shift = Shifts::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

   }

}