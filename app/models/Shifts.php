<?php

class Shifts extends Eloquent {

	protected $fillable = [];

	public static function faults(){

		return self::where('fault', '=', true)->get();

	}

	public static function noFaults(){

		return self::where('fault', '=', false)->get();

	}

}