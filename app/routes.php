<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


if(Auth::check() && Auth::user()->type=='administrator'):

	Route::controller('/auth','AuthController');
	Route::controller('/users','UserController');
	Route::controller('/employees', 'EmployeeController');
	Route::controller('/services', 'ServiceController');
	Route::controller('/shifts', 'ShiftController');
	Route::controller('/absences', 'AbsenceController');
	Route::controller('/programmer', 'ProgrammerController');
	Route::controller('/calendar', 'CalendarController');

elseif(Auth::check() && Auth::user()->type=='operator'):

	Route::controller('/auth','AuthController');
	Route::controller('/employees', 'EmployeeController');
	Route::controller('/programmer', 'ProgrammerController');
	Route::controller('/calendar', 'CalendarController');

else:

	Route::controller('/auth', 'AuthController');
	Route::controller('/', 'AuthController');

endif;

