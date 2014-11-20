@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
             Formulario Empresa
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
                <a href="{{ $route }}"><i class="icon-user"></i>Ir Atrás</a>
              </div>

              <div class="widget-content padded">
		        <form action="" method="post" class="form-horizontal">

		        	<div class="form-group">

			            <label class="control-label col-md-1">Nombre</label>
			            <div class="col-md-3">
			              <input class="form-control" placeholder="Escriba el nombre" name="first_name" type="text" required value="{{ $employee->first_name }}">
			            </div>

			            <label class="control-label col-md-1">Apellido</label>
			            <div class="col-md-3">
			              <input class="form-control" placeholder="Escriba el apellido" name="last_name" type="text" required value="{{ $employee->last_name }}">
			            </div>

			            <label class="control-label col-md-1">Cédula</label>
			            <div class="col-md-2">
			              <input class="form-control" placeholder="Escriba el apellido" name="identification_number" type="text" required value="{{ $employee->identification_number }}">
			            </div>

			        </div>

		         	<div class="form-group">

			            <label class="control-label col-md-1">Correo</label>
			            <div class="col-md-3">
			              <input class="form-control" placeholder="Escriba el correo" name="email" type="email" required value="{{ $employee->email }}">
			            </div>

			            <label class="control-label col-md-1">Teléfono</label>
			            <div class="col-md-3">
			              <input class="form-control" placeholder="Escriba el telefono" name="phone" type="text" required value="{{ $employee->phone }}">
			            </div>

			        </div>
			 
					<div class="form-group">

			            <label class="control-label col-md-1">Dirección</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba dirección del empleado" name="address" type="text" required value="{{ $employee->address }}">
			            </div>

			            <div class="col-md-2">

			          	</div> 

			            <div class="col-md-1">
			              <input class="form-control" placeholder="" style="padding:0px" value="Enviar" type="submit">
			          	</div> 			        
			       
			          </div>
		        </form>
		      </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">

        $(document).on('ready', function(){
        	$("#delete-representante").click(function(e){
    			$('input[name=id_persona]').val('');
				$('#form-display-representante').css({
					'display':'none'
				});
				$('#add-representante').css({
					'display':'block'
				});
        	});
        	$('.fancybox').fancybox({
				maxWidth	: 800,
				maxHeight	: 600,
				fitToView	: false,
				width		: '70%',
				height		: '70%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
        	$('#id_tipo_employee').change(function(e){
        		var elem = $(this);
        		console.log("Cambio a: " + elem.val());
        		var data = {
        			'id' : elem.val(),
        		};
        		$.post('/ajax/codigoemployees', data, function(data){
        			$('#id_codigo').val(data);
        			console.log(data);
        		});
        	})
        });

        </script>
        <!-- end DataTables Example -->
        @stop