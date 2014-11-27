<?php

class Employees extends Eloquent {

	protected $fillable = [];

	public static function allFrom( $from, $days = 15 ){

		$employees = self::all();
	
		foreach( $employees as $employee ):
			$employee->programs = self::programmersFilterFrom( $from, $employee->id, $days );
		endforeach;

		return $employees;

	}

	public function programmersFortnight(){

		$today =  date('d');
		$month = date('m');
		$year = date('Y');

		$mindate = null;
		$maxdate = null;

		if( $today <= 15 ):

			$mindate = date('Y-m-d', strtotime($year.'-'.$month.'-1'));;
			$maxdate = date('Y-m-d', strtotime($year.'-'.$month.'-15'));;

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

			$mindate = date('Y-m-d', strtotime($year.'-'.$month.'-16'));;
			$maxdate = date('Y-m-d', strtotime($year.'-'.$month.'-'.$limit));;

		endif;

		return $this->hasMany( 'Programmers', 'id_employee' )
			->where ('program_date', '>', date('Y-m-d', strtotime($mindate)))
			->where ('program_date', '<', date('Y-m-d', strtotime($maxdate)))
            ->orderBy('program_date','asc');

	}

	public function programmersInterval(){

		$today =  date('d');
		$month = date('m');
		$year = date('Y');

		$dates = array();

		$maxdate = date('Y-m-d', strtotime('+4 days'));
		$mindate = date('Y-m-d', strtotime('-4 days'));

		return $this->hasMany( 'Programmers', 'id_employee' )
			->where ('program_date', '>', date('Y-m-d', strtotime($mindate)))
			->where ('program_date', '<', date('Y-m-d', strtotime($maxdate)))
            ->orderBy('program_date','asc');

	}

	public static function programmersFilterFrom( $from, $employee, $days ){

		$mindate = date('Y-m-d', strtotime($from));
		$maxdate = date('Y-m-d', strtotime($mindate.'+'.$days.' days'));

		return Programmers::where('id_employee', '=', $employee )
			->where ('program_date', '>', date('Y-m-d', strtotime($mindate)))
			->where ('program_date', '<', date('Y-m-d', strtotime($maxdate)))
            ->orderBy('program_date','asc')->get();

	}

	public function programmers(){

		return $this->hasMany( 'Programmers', 'id_employee' );

	}

}