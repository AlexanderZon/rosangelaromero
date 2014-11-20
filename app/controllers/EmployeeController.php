<?php

class EmployeeController extends \BaseController {

	protected $route = '/employees';

	public function getIndex()
	{
		$employees = Employees::all();

			$array = array(
			'employees' => $employees,
			'route' => $this->route
			);

		return View::make('employees.index')->with($array);

	}

	public function postIndex()
	{

		$desde = Input::get('desde');
		$from = Input::get('hasta');
		$municipio = Input::get('municipio');

		$employees = Employees::all();

			$array = array(
			'employees' => $employees,
			'route' => $this->route
			);

		return View::make('employees.index')->with($array);

	}

	public function getCreate()
	{
		$array = array(
			'route' => $this->route,
		);

		return View::make('employees.create')->with( $array );

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

		$employee = new Employees();
		$employee->first_name = Input::get('first_name');
		$employee->last_name = Input::get('last_name');
		$employee->identification_number = Input::get('identification_number');
		$employee->address = Input::get('address');
		$employee->phone = Input::get('phone');
		$employee->email = Input::get('email');

		$employee->save();

		return Redirect::to($this->route);

	}

	public function getEdit( $id ){

		if( $id != '' ):

			$id = Crypt::decrypt($id);
			$employee = Employees::find($id);

			$array = array(
				'route' => $this->route,
				'employee' => $employee,
				);	

			return View::make('employees.edit')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;

	}
	
	public function postEdit( $id = '' ){

		$id = Crypt::decrypt($id);
		$employee = Employees::find($id);
		$employee->first_name = Input::get('first_name');
		$employee->last_name = Input::get('last_name');
		$employee->identification_number = Input::get('identification_number');
		$employee->address = Input::get('address');
		$employee->phone = Input::get('phone');
		$employee->email = Input::get('email');

		$employee->save();

		
		return Redirect::to($this->route);

	}

	public function getShow( $id ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$employee = Employees::find($id);

			$array = array(
				'route' => $this->route,
				'employee' => $employee,
				);	

			return View::make('employees.show')->with( $array );

		else:

			return Redirect::to($this->route);

		endif;

	}

	public function getDelete( $id ){

		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$employee = Employees::find($id);

			$array = array(
				'employee' => $employee,
				'route' => $this->route
				);	

			return View::make('employees.delete')->with( $array );
		else:

			return Redirect::to($this->route);
		endif;

	}
   
   public function postDelete($id = '' ){

   	if( $id != '' ):
			$id = Crypt::decrypt($id);
			$employee = Employees::destroy($id);

			return Redirect::to($this->route);

		else:

			return Redirect::to($this->route);
		endif;


   }

/*   public function postFindrepresentante(){

   		$persona = Personas::where('cedula','=',Input::get('cedula'))->get();

   		if(count($persona) > 0):
   			return $persona[0];
   		else:
   			return 0;
   		endif;

   }

   public function getRepresentante(){

   		return View::make('employees.representante')->with( array( 'route' => $this->route ) );

   }

   public function postRepresentante(){

   		$persona = new Personas();
   		$persona->nombre = Input::get('nombre');
   		$persona->cedula = Input::get('cedula');
   		$persona->rif = Input::get('rif');

   		if($persona->save()):
   			$array = array(
   				'id' => $persona->id,
   				'nombre' => $persona->nombre,
   				'cedula' => $persona->cedula,
   				);
   			return Response::json($array);
   		else:
   			return 0;
   		endif;

   }

   public function postFindsocio(){

   		$persona = Personas::where('cedula','=',Input::get('cedula'))->get();

   		if(count($persona) > 0):
   			return $persona[0];
   		else:
   			return 0;
   		endif;

   }

   public function postFindsociobyid(){

   		$persona = Personas::find(Input::get('id'));
   		return $persona;

   		if(count($persona) > 0):
   			return $persona;
   		else:
   			return 0;
   		endif;

   }

   public function getSocios(){

   		return View::make('employees.socios')->with( array( 'route' => $this->route ) );

   }

   public function postSocios(){

   		$persona = new Personas();
   		$persona->nombre = Input::get('nombre');
   		$persona->cedula = Input::get('cedula');
   		$persona->rif = Input::get('rif');

   		if($persona->save()):
   			$array = array(
   				'id' => $persona->id,
   				'nombre' => $persona->nombre,
   				'cedula' => $persona->cedula,
   				);
   			return Response::json($array);
   		else:
   			return 0;
   		endif;

   }

   public function getReporte( $id = '' ){

   		if( $id != '' ):
			$id = Crypt::decrypt($id);
			$employee = Employees::find($id);
			$usuarios = User::where('tipo', '=', 'vip')->take(1)->get();
			$usuarios = $usuarios[0];
			$employee->fecha_ingreso = date("d-m-Y", strtotime($employee->fecha_ingreso));
			$employee->fecha_snc = date("d-m-Y", strtotime($employee->fecha_snc));
			$employee->fecha_ince = date("d-m-Y", strtotime($employee->fecha_ince));
			$employee->fecha_patente = date("d-m-Y", strtotime($employee->fecha_patente));
			$employee->fecha_vencimiento = date("d-m-Y", strtotime($employee->fecha_vencimiento));
			$fecha = date('d-m-Y', strtotime("$employee->fecha_ingreso+6 months"));
			include('/mpdf/mpdf.php'); 

			$html = '<html><body>'
			. '<img src="/images/logo_sistema-1.png" width="12%" height="auto">'

           

            . '<p align="center">
               CERTIFICADO DE INSCRIPCIÓN EN EL REGISTRO DE ORGANIZACIONES </p>'

            . '<p align="justify">

                Por medio de la presente damos constancia que la employee '.$employee->nombre.',representada por '.$employee->representante->nombre.',
                cédula de identidad número '.$employee->representante->cedula.', se encuentra formalmente inscrita
                en el registro de Organizaciones del Gobierno Bolivariano del Estado Aragua, quedando anotada con el N° '.$employee->codigo .'
                de fecha '.$employee->fecha_ingreso .', actualizada el:'.$employee->fecha_ingreso .' con el Rif '.$employee->rif .', Nit '.$employee->nit .'. </p>'
            
            . '<p>Dirección: '.$employee->direccion .', Municipio: '.$employee->municipio->nombre .' </p>'
            . '<p>Telefono: '.$employee->telefono .' </p>'

                      
            . '<p align="right">
                SNC: '.$employee->snc->numero .  '  Fecha: '.$employee->snc->fecha .'</p>'     
            . '<p align="right">
                INCE: '.$employee->ince->numero .'  Fecha : '.$employee->ince->fecha .'</p>'            
            . '<p align="right" >IVSS: '.$employee->seguro->numero .' Fecha: '.$employee->seguro->fecha .' </p>'
            
           
          
         
            


             .'<p align="center"> '.$usuarios->nombre.' '.$usuarios->apellido.'</p>'


             . '<p align="center">     

             SECRETARIA DEL PODER POPULAR PARA LA HACIENDA, ADMINISTRACIÓN Y FINANZAS Decreto N° 2977 de fecha 22-04-2013 publicado en Gaceta oficial Ordinaria del 
              Estado Aragua de fecha 22 de Abril del año 2013, valido desde  '.$employee->fecha_ingreso.' hasta el '.$employee->fecha_vencimiento.'  </p>'


            . '<img src="/images/linea.png" width="100%" height="5%">'

       
          
             . '<img src="/images/logo_sistema-1.png" width="12%" height="auto">'

           

            . '<p align="center">
             CERTIFICADO DE INSCRIPCIÓN EN EL REGISTRO DE ORGANIZACIONES </p>'

            . '<p align="justify">

            Por medio de la presente damos constancia que la employee '.$employee->nombre.',representada por '.$employee->representante->nombre.',

                cédula de identidad número '.$employee->representante->cedula.', se encuentra formalmente inscrita
                en el registro de Organizaciones del Gobierno Bolivariano del Estado Aragua, quedando anotada con el N° '.$employee->codigo .'
                de fecha '.$employee->fecha_ingreso .', actualizada el:'.$employee->fecha_ingreso .' con el Rif '.$employee->rif .', Nit '.$employee->nit .'. </p>'
            
            . '<p>Dirección: '.$employee->direccion .', Municipio: '.$employee->municipio->nombre .' </p>'
            
            . '<p>Telefono: '.$employee->telefono .' </p>'
                      
            . '<p align="right">
                SNC: '.$employee->snc->numero .  '  Fecha: '.$employee->snc->fecha .' </p>'
           
            . '<p align="right">
                INCE: '.$employee->ince->numero .'  Fecha : '.$employee->ince->fecha .' </p>'
            
            . '<p align="right" >IVSS: '.$employee->seguro->numero .' Fecha: '.$employee->seguro->fecha .' </p>'
            
           
            
            .'<p align="center"> '.$usuarios->nombre.' '.$usuarios->apellido.'</p>'


             . '<p align="center">     

             SECRETARIA DEL PODER POPULAR PARA LA HACIENDA, ADMINISTRACIÓN Y FINANZAS Decreto N° 2977 de fecha 22-04-2013 publicado en Gaceta oficial Ordinaria del 
              Estado Aragua de fecha 22 de Abril del año 2013, valido desde  '.$employee->fecha_ingreso.' hasta el '.$fecha.' </p>'

              
           
            . '</body></html>';

            $mpdf=new mPDF();
			$mpdf->Bookmark('Start of the document');
			$mpdf->WriteHTML($html);
			$mpdf->Output();

    
    		//return mPDF::render($html, 'A4', 'portrait')->show();

		else:

			return Redirect::to($this->route);
		endif;

   }

   public function postReporte(){

		$employees = null;

   		if(Input::get('busqueda') == '' ):

   			$employees = Employees::all();

   		elseif(Input::get('busqueda') == 'intervalo'):

   			$employees = Employees::whereBetween( 'created_at', array( Input::get('desde'), Input::get('hasta') ) );

   		elseif(Input::get('busqueda') == 'municipio'):

   			$municipio = Municipios::where('nombre','=',Input::get('municipio'))->take(1)->get();

   		endif;

   	$args = array(
   		'employees' => $employees
   		);

    return PDF::load( View::make('pdfs.lista_employees', $args) , 'A4', 'portrait')->show();

   }

   public function postReporte2(){

   		$employees = null;

   		if(Input::get('busqueda') == '' ):

   			$employees = Employees::all();

   		elseif(Input::get('busqueda') == 'intervalo'):

   			$employees = Employees::whereBetween( 'created_at', array( Input::get('desde'), Input::get('hasta') ) );

   		elseif(Input::get('busqueda') == 'municipio'):

   			$municipio = Municipios::where('nombre','=',Input::get('municipio'))->take(1)->get();

   		endif;

    	include('/mpdf/mpdf.php'); 

			$html = '<img src="/images/etiqueta.png" width="100%" height="45">'
      .'<div class="container-fluid main-content">'
        .'<div class="page-title">'
		.'<h1>'
            .'Employees'
		.'</h1>'
        .'</div>'
        	.'<table><tbody>'
              	.'<tr style="display:block">'
                    .'<th style="padding:10px; background-color: #999;border:1px;margin:1em;">'
                      .'Codigo'
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Nombre'
                    .'</th>'
                     .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Representante'
                    .'</th>'
                     .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Direccion'
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Rif'
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Telefono'
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Creado el '
                    .'</th>'
                    .'<th style="padding:1em; background-color: #999;border:1px;margin:1em;">'
                      .'Actualizado el'
                    .'</th>'
                .'</tr>';

        foreach($employees as $employee):

        	$html .= '<tr>'
                      .'<td>'
                        . $employee->codigo 
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$employee->nombre
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$employee->representante->nombre
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$employee->direccion 
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$employee->rif
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$employee->telefono
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$employee->created_at
                      .'</td>'
                      .'<td class="hidden-xs">'
                        .$employee->updated_at 
                      .'</td>'
                    .'</tr>';
        endforeach;
                  
        $html .'</tbody>';

            $mpdf=new mPDF();
			$mpdf->WriteHTML($html);
			$mpdf->Output();

   }
*/
}