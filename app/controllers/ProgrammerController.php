<?php

class ProgrammerController extends \BaseController {

	protected $route = '/programmer';

	public function getIndex()
	{

		$employees = Employees::all();

		$dates = $this->getInterval();

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

	public function getInterval(){

		$today =  date('d');
		$month = date('m');
		$year = date('Y');

		$dates = array();

		for ($i = -4; $i <= 4; $i++) { 
			if( $i > -1 ):
				$dates[] = date('Y-m-d', strtotime('+'.$i.' days'));
			else:
				$dates[] = date('Y-m-d', strtotime($i.' days'));
			endif;
		}

		/*if( $today <= 15 ):

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


		endif;*/

		return $dates;

	}

	public function getProgram( $employee, $date ){

		$array = array(
			'employee' => $employee,
			'date' => $date,
			'services' => Services::all(),
			'shifts' => Shifts::noFaults(),
			'absences' => Shifts::faults(),
			'route' => $this->route
			);

		return View::make('programmers.create')->with( $array );

	}

	public function postProgram( $employee, $date ){

		$employee = Crypt::decrypt($employee);
		$date = Crypt::decrypt($date);

		$program = new Programmers();
		$program->id_employee = $employee;
		$program->id_service = Input::get('assistence') != null ? Input::get('service') : 0;
		$program->id_shift = Input::get('assistence') != null ? Input::get('shift') : Input::get('absence');
		$program->program_date = date('Y-m-d', strtotime($date));

		if($program->save()){
			return Response::json(array(
				'error' => false,
				'route' => $this->route,
				'id_program' => $program->id,
				'program' => Crypt::encrypt($program->id),
				'employee' => $program->id_employee,
				'date' => $program->program_date,
				'fault' => $program->shift->fault
				));
		}
		else{
			return Response::json(array(
				'error' => true
				));
		}

	}

	public function getReprogram( $program ){

		$program = Programmers::find(Crypt::decrypt($program));

		$array = array(
			'program' => $program,
			'services' => Services::all(),
			'shifts' => Shifts::noFaults(),
			'absences' => Shifts::faults(),
			'route' => $this->route
			);

		return View::make('programmers.edit')->with( $array );

	}

	public function postReprogram( $program ){

		$program = Programmers::find(Crypt::decrypt($program));
		$program->id_service = Input::get('assistence') != null ? Input::get('service') : 0;
		$program->id_shift = Input::get('assistence') != null ? Input::get('shift') : Input::get('absence');

		if($program->save()){
			return Response::json(array(
				'error' => false,
				'route' => $this->route,
				'id_program' => $program->id,
				'program' => Crypt::encrypt($program->id),
				'employee' => $program->id_employee,
				'date' => $program->program_date,
				'fault' => $program->shift->fault
				));
		}
		else{
			return Response::json(array(
				'error' => true
				));
		}

	}

	public function postIndex(){

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