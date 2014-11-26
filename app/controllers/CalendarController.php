<?php

class CalendarController extends \BaseController {

	protected $route = '/programmer';

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

	public function getFromTo( $from, $to ){

		$from = date('Y-m-d', strtotime($from));
		$to = date('Y-m-d', strtotime($to));

		$dates = array();

		return $dates;

	}

}