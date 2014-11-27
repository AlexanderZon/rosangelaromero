<?php

class CalendarController extends \BaseController {

	protected $route = '/calendar';

	public function getIndex()
	{

		$employees = Employees::all();

		$dates = $this->getFortnight();

		$array = array(
			'employees' => $employees,
			'dates' => $dates,
			'route' => $this->route
		);

		return View::make('calendar.show')->with($array);

	}

	public function postIndex(){

		$from = Input::get('from');

		$employees = Employees::allFrom($from);

		$programs = $employees[0]->programs;

		$dates = $this->getFrom( $from );

		//dd($employees[0]->programmersFortnight());

		$array = array(
			'employees' => $employees,
			'dates' => $dates,
			'from' => $from,
			'route' => $this->route
		);

		return View::make('calendar.filter')->with($array);

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

	public function getFrom( $from ){

		$from = date('Y-m-d', strtotime($from));

		$dates = array();

		for( $i = 0 ; $i < 15 ; $i++ ){
			$dates[] = date('Y-m-d', strtotime($from.'+'.$i.' days'));
		}

		return $dates;

	}

}