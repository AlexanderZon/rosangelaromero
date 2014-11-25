<?php

class ServiceController extends \BaseController {

	protected $route = '/services';

	public function getIndex()
	{
		$services = Services::all();

			$array = array(
			'services' => $services,
			'route' => $this->route
			);

		return View::make('services.index')->with($array);

	}

	public function postIndex()
	{

		$desde = Input::get('desde');
		$from = Input::get('hasta');
		$municipio = Input::get('municipio');

		$services = Services::all();

			$array = array(
			'services' => $services,
			'route' => $this->route
			);

		return View::make('services.index')->with($array);

	}

	public function getCreate()
	{
		$array = array(
			'route' => $this->route,
		);

		return View::make('services.create')->with( $array );

	}
	public function postCreate(){

		$year = date('Y');
		$month = date('m');
		$day = '31';

		if( $month > 6 ):
			$month = '12';
		else:
			$month = '06';
			$day = '30';
		endif;

		$fecha_vencimiento = $day.'-'.$month.'-'.$year;

		$service = new Services();
		$service->name = Input::get('name');
		$service->employees_required = Input::get('employees_required');

		$service->save();

		return Redirect::to($this->route);

	}

	public function getEdit( $id ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$service = Services::find($id);

			$array = array(
				'route' => $this->route,
				'service' => $service,
				);	

			return View::make('services.edit')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;

	}
	
	public function postEdit( $id = '' ){

		$id = Crypt::decrypt($id);
		$service = Services::find($id);
	    $service->name = Input::get('name');
	    $service->employees_required = Input::get('employees_required');

		$service->save();

		
		return Redirect::to($this->route);

	}

	public function getDelete( $id ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$service = Services::find($id);

			$array = array(
				'service' => $service,
				'route' => $this->route
				);	

			return View::make('services.delete')->with( $array );
		else:

			return Redirect::to($this->route);
		endif;

	}
   
   public function postDelete($id = '' ){

   	if( $id != '' ):
			$id = Crypt::decrypt($id);
			$service = Services::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);
		endif;

   }

}