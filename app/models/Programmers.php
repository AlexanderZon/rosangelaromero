<?php

class Programmers extends \Eloquent {

	protected $fillable = [];

	public function employeer(){

		return $this->belongsTo('Employeer', 'id_employee');
		
	}

	public function service(){

		return $this->belongsTo('Services', 'id_service');
		
	}

	public function shift(){

		return $this->belongsTo('Shifts', 'id_shift');
	}

	public static function getByDate( $date = '' ){

		return self::where('program_date', '=', date("Y-m-d", strtotime($date) ) );

	}

}