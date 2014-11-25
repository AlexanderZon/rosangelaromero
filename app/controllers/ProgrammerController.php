<?php

class ProgrammerController extends \BaseController {

	protected $route = '/programmers';

	public function getIndex()
	{

		$employees = Employees::all();

		$dates = $this->getFortnight();

		$array = array(
			'employees' => $employees,
			'dates' => $dates,
			'route' => $this->route
		);

		return View::make('programmers.index')->with($array);

	}

	public function getFortnight(){

		$today =  date('d');
		$month = date('m');
		$year = date('Y');

		$dates = array();

		if( $today <= 15 ):

			for ($i = 1; $i <= 15; $i++) { 
				$dates[] = date('Y-m-d', strtotime($year.'-'.$month.'-'.$i));
			}

		else:

			$limit = 30;

			switch( $month ){
				case '1':
				case '3':
				case '5':
				case '7':
				case '8':
				case '10':
				case '12':
					$limit = 31;
					break;
				case '2':
					if($year%4 == 0):
						$limit = 29;
					else:
						$limit = 28;
					endif;
					break;
				default:
					$limit = 30;
					break;

			}

			for ($i = 16; $i <= $limit; $i++) { 
				$dates[] = date('Y-m-d', strtotime($year.'-'.$month.'-'.$i));
			}


		endif;

		return $dates;

	}

	public function postIndex()
	{

		$desde = Input::get('desde');
		$from = Input::get('hasta');
		$municipio = Input::get('municipio');

		$programmers = Programmers::all();

			$array = array(
			'programmers' => $programmers,
			'route' => $this->route
			);

		return View::make('programmers.index')->with($array);

	}

	public function getCreate()
	{
		$array = array(
			'route' => $this->route,
		);

		return View::make('programmers.create')->with( $array );

	}

	public function postCreate(){

		$programmer = new Programmers();
		$programmer->title = Input::get('title');
		$programmer->prefix = Input::get('prefix');
		$programmer->fault = false;

		$programmer->save();

		return Redirect::to($this->route);

	}

	public function getEdit( $id ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$programmer = Programmers::find($id);

			$array = array(
				'route' => $this->route,
				'programmer' => $programmer,
				);	

			return View::make('programmers.edit')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;

	}
	
	public function postEdit( $id = '' ){

		$id = Crypt::decrypt($id);
		$programmer = Programmers::find($id);
	    $programmer->title = Input::get('title');
	    $programmer->prefix = Input::get('prefix');
		$programmer->fault = false;

		$programmer->save();
		
		return Redirect::to($this->route);

	}

	public function getDelete( $id ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$programmer = Programmers::find($id);

			$array = array(
				'programmer' => $programmer,
				'route' => $this->route
				);	

			return View::make('programmers.delete')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;

	}
   
   	public function postDelete($id = '' ){

   		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$programmer = Programmers::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);

		endif;

   }

}