
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Programar Jornada <span class="day-month">{{ date('d/m/Y', strtotime(Crypt::decrypt($date))) }}</span>
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">

              <div class="widget-content padded" id="widget-content">
		        <form action="#" method="post" class="form-horizontal" id="programmer-form">
			        <div class="form-group" id="assistence">
			            <label class="control-label col-md-2">Asistencia</label>
			            <div class="col-md-2 clearfix">
			              	<div class="holder">
			                	<input class="check-ios" id="check" name="assistence" type="checkbox" value="yes"/><label for="check"></label><span></span>
			              	</div>
			            </div>
			            <div class="col-md-8 clearfix">
			              	<em>(Cheque el botón si el empleado asistirá a la jornada)</em>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Servicio</label>
			            <div class="col-md-10">
			            	<select class="form-control" name="service">
			            		<option value="0">--- SELECCIONE ---</option>
			            		@foreach( $services as $service )
			            			<option value="{{ $service->id }}">{{ $service->name }}</option>
			            		@endforeach
			            	</select>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Turno</label>
			            <div class="col-md-10">
			            	<select class="form-control" name="shift">
			            		<option value="0">--- NINGUNO ---</option>
			            		@foreach( $shifts as $shift )
			            			<option value="{{ $shift->id }}">{{ $shift->title }} ({{ $shift->prefix }})</option>
			            		@endforeach
			            	</select>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Liberación</label>
			            <div class="col-md-10">
			            	<select class="form-control" name="absence">
			            		<option value="0">--- NINGUNO ---</option>
			            		@foreach( $absences as $absence )
			            			<option value="{{ $absence->id }}">{{ $absence->title }} ({{ $absence->prefix }})</option>
			            		@endforeach
			            	</select>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2"></label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="" value="Enviar" type="submit">
			            </div>
			        </div>
		        </form>
		      </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">
        	var sendData = function(form){
        		$.ajax({
        			data: form.serialize(),
        			type: 'post',
        			url: '{{ $route }}/program/{{ $employee }}/{{ $date }}',
        			success: function(data){
        				if(data.error){
        					$('#widget-content').html('Hubo un error al establecer los datos de la jornada');
        				}
        				else{
        					$('#widget-content').html('Jornada establecida');
        					$('td[data-coord='+data.employee+'-'+data.date+']').html('<div class="arrow-left"></div><a href="'+data.route+'/reprogram/'+data.program+'/" class="fancybox fancybox.ajax"><i class="fa icon-edit"></i></a>');
        					if(data.fault){
        						$('td[data-coord='+data.employee+'-'+data.date+']').removeClass('inactive');
        						$('td[data-coord='+data.employee+'-'+data.date+']').removeClass('blue');
        						$('td[data-coord='+data.employee+'-'+data.date+']').addClass('red');
        					}
        					else{
        						$('td[data-coord='+data.employee+'-'+data.date+']').removeClass('inactive');
        						$('td[data-coord='+data.employee+'-'+data.date+']').removeClass('red');
        						$('td[data-coord='+data.employee+'-'+data.date+']').addClass('blue');
        					}
        				}
        				console.log(data);
        			},
        			error: function(e){
        				console.log(e);
        			}
        		});
        	}
        	$('#programmer-form').on('submit', function(e){
        		e.preventDefault();
        		var form = $(this);
        		if($('input[name=assistence]').is(':checked')){
	    			if($('select[name=service]').val() == 0){
	    				//alert('Debe seleccionar un servicio');
	    				$('select[name=service]').focus();
	    				$('select[name=service]').parent().addClass('has-error');
	    				$('select[name=absence]').parent().removeClass('has-error');
	    				$('select[name=shift]').parent().removeClass('has-error');
	    			}
        			else if($('select[name=shift]').val() == 0){
        				//alert('Debe seleccionar un turno');
        				$('select[name=shift]').focus();
        				$('select[name=shift]').parent().addClass('has-error');
        				$('select[name=absence]').parent().removeClass('has-error');
						$('select[name=service]').parent().removeClass('has-error');
        			}
        			else{
        				sendData( form );
        			}
        		}
        		else{
        			console.log("Else"+$('select[name=absence]').val());
        			if($('select[name=absence]').val() == 0){
        				//alert('Debe seleccionar un tipo de liberación');
        				$('select[name=absence]').focus();
        				$('select[name=absence]').parent().addClass('has-error');
        				$('select[name=shift]').parent().removeClass('has-error');
						$('select[name=service]').parent().removeClass('has-error');
        			}
        			else{
        				sendData( form );
        			}
        		}

        		return false;

        	});
        </script>
        <!-- end DataTables Example -->