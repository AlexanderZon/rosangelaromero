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

/*

Clonar el sistema en una nueva computadora:
	 git clone "Ruta del repositorio" 
Visualizar los Cambios:
	 git status
Agregar archivos nuevos:
	 git add -A
Darle nombre a los cambios:
	 git commit -am "Nombre de los cambios realizados"
Subir los cambios:
	 git push origin master
Descargar los cambios:
	 git pull

*/

/*if(Auth::check() && Auth::user()->tipo=='administrador'):
	Route::controller('/auth','AuthController');
	Route::controller('/usuarios','UserController');
	Route::controller('/empresas', 'EmpresaController');
	Route::controller('/personas', 'PersonaController');
	Route::controller('/socios', 'SocioController');
	Route::controller('/municipios', 'MunicipioController');
	Route::controller('/servicios', 'ServicioController');
	Route::controller('/actividades', 'ActividadController');
	Route::controller('/tipoempresas', 'TipoEmpresaController');
	Route::controller('/ajax', 'AjaxController');
elseif(Auth::check()):
	Route::controller('/auth','AuthController');
	Route::controller('/empresas', 'EmpresaController');
	Route::controller('/personas', 'PersonaController');
	Route::controller('/socios', 'SocioController');
	Route::controller('/ajax', 'AjaxController');
endif;
	Route::controller('/auth','AuthController');*/
/*

cprov.ga/holamundo/index
cprov.ga/holamundo/

*/

if(Auth::check() && Auth::user()->type=='administrator'):

	Route::controller('/auth','AuthController');
	Route::controller('/users','UserController');
	Route::controller('/employees', 'EmployeeController');
	/*Route::controller('/ajax', 'AjaxController');*/

elseif(Auth::check() && Auth::user()->type=='operator'):

	Route::controller('/auth','AuthController');
	Route::controller('/employees', 'EmployeeController');
	/*Route::controller('/ajax', 'AjaxController');*/

else:

	Route::controller('/auth', 'AuthController');
	Route::controller('/', 'AuthController');

endif;

