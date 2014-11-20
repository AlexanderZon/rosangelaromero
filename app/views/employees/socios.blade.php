      <!-- End Navigation -->

      <!--
     <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Añadir Socios
          </h1>
        </div>
                                                         <!-- DataTables Example -->
      
      <!--  <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">

              <div class="widget-content padded">
		        <form action="" method="post" class="form-horizontal" id="form-socio">
		        	<input id="socio-finded" type="hidden" name="finded" value="false">
					<div class="form-group">
			            <label class="control-label col-md-2" if=>Cédula</label>
			            <div class="col-md-7">
			              <input id="socio-cedula" class="form-control" placeholder="Escriba el apellido de la persona" name="cedula" type="text" required>
			            </div>
			        </div>
		          	<div class="form-group">
			            <label class="control-label col-md-2" if=>Nombre</label>
			            <div class="col-md-7">
			              <input id="socio-nombre" class="form-control" placeholder="Escriba el nombre de la persona" name="nombre" type="text" required/>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2" if=>Rif</label>
			            <div class="col-md-7">
			              <input id="socio-rif" class="form-control" placeholder="Escriba el usuario de la persona" name="rif" type="text" required>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2"></label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="" value="Agregar" type="submit">
			            </div>
			        </div>
		        </form>
		        <div class="widget-container fluid-height clearfix">
			      	<div class="heading">
				        <i class="fa fa-comment"></i>Socios Agregados
				        <div style="display:inline-block; float: right"><a href="#" id="reset-socios">Limpiar Socios</a></div>
				    </div>
			    	<div class="widget-content padded">
				        <form class="form-horizontal" id="form-socios-selected">

							<div class="form-group" id="socios-seleccionados">
								<script type="text/javascript">
									if($('input[name*=socios]').length > 0){
										var elems = $('input[name*=socios]').serializeArray();
										//console.log(elems);
										$('input[name*=socios]').each(function(){
											var elem = $(this);
											//console.log('valor: ' + elem.val());
							    			$.ajax({
							    				url: '{{ $route }}/findsociobyid',
							    				type: 'post',
							    				data: { 'id': elem.val() },
							    				success: function(data){

						    						$('#socios-seleccionados').append('<div class="col-md-12" id="input-socio"><input type="hidden" name="socios_seleccionados[]" value="' + data.id + '" style="display:none"/><span>' + data.cedula + ' - ' + data.nombre + '</span><!--<a href="#" class="delete-socio" style="margin-left: 5px;padding: 1px 5px;background-color: #620000; color: #FFFFFF;">x</a>--></div>');
							    				
      <!--	console.log(data);
							    				},
							    				error: function(e){
							    					console.log(e);
							    				}
							    			});
										});
									}
									else{
										$('#socios-seleccionados').html('<em id="no-one-person" class="control-label col-md-12">(Ningún Socio Agregado)</em>');
									}
								</script>
					        </div>
							<div class="form-group">
					            <label class="control-label col-md-2"></label>
					            <div class="col-md-7">
					              <input class="form-control" placeholder="" value="Listo" type="submit">
					            </div>
					        </div>
				        </form>
			      	</div>
			    </div>
		    </div>
        </div>
    </div>
</div>

        <script type="text/javascript">

			$('#socio-cedula').on('keyup', function(e){
				//console.log('encontrando a '+$(this).val());
				$.ajax({
    				url: '{{ $route }}/findsocio',
    				type: 'post',
    				data: {'cedula':$(this).val()},
    				success: function(data){
    					if(data != 0){
    						$('#socio-nombre').val(data.nombre);
    						$('#socio-nombre').attr('readonly', 'true');
    						$('#socio-rif').val(data.rif);
    						$('#socio-rif').attr('readonly', 'true');
    						$('#socio-finded').val(data.id);
    					}
    					else{
    						$('#socio-nombre').removeAttr('readonly');
    						$('#socio-rif').removeAttr('readonly');
    						$('#socio-finded').val('false');
    					}
    					console.log(data);
    				},
    				error: function(e){
    					console.log(e);
    				}
    			})
			});
    		$('#form-socio').on('submit', function(e){
    			if($('#socio-finded').val() != 'false'){
    				if($('input[name*=socios_seleccionados]').length == 0){
    					$('#socios-seleccionados').html('');
    				}

    				$('#socios-seleccionados').append('<div class="col-md-12" id="input-socio"><input type="hidden" name="socios_seleccionados[]" value="' + $('#socio-finded').val() + '" style="display:none"/><span>' + $('#socio-cedula').val() + ' - ' + $('#socio-nombre').val() + '</span><!--<a href="#" id="delete-socio" style="margin-left: 5px;padding: 1px 5px;background-color: #620000; color: #FFFFFF;">x</a>--></div>');

				
      <!--	$('#socio-finded').val('');
					$('#socio-cedula').val('');
					$('#socio-nombre').val('');
					$('#socio-rif').val('');

    				return false;
    			}
    			else{
	    			var elem = $(this);
	    			$.ajax({
	    				url: '{{ $route }}/socios',
	    				type: 'post',
	    				data: elem.serialize(),
	    				success: function(data){
		    				//$('input[name=id_persona]').val(data.id);
		    				$('#form-display-socio-span').html(data.cedula + ' - ' + data.nombre);
		    				$('#form-display-socio').css({
		    					'display':'block'
		    				});
		    				$('#add-socio').css({
		    					'display':'none'
		    				});

		    				if($('input[name*=socios_seleccionados]').length == 0){
		    					$('#socios-seleccionados').html('');
		    				}

    						$('#socios-seleccionados').append('<div class="col-md-12" id="input-socio"><input type="hidden" name="socios_seleccionados[]" value="' + data.id + '" style="display:none"/><span>' + data.cedula + ' - ' + data.nombre + '</span><!--<a href="#" class="delete-socio" style="margin-left: 5px;padding: 1px 5px;background-color: #620000; color: #FFFFFF;">x</a>--></div>');
    		
      <!--				$('#socio-finded').val('');
    						$('#socio-cedula').val('');
    						$('#socio-nombre').val('');
    						$('#socio-rif').val('');
	    					console.log(data);
	    				},
	    				error: function(e){
	    					console.log(e);
	    				}
	    			});
	    			//console.log(elem.serialize());
	    			return false;
	    		}

    						$('.delete-socio').click(function(e){
    							var elem = $(this).parent();
    							console.log(elem);
    						});
    		});
    		$('#form-socios-selected').on('submit', function(e){
    			$("#socios-container").html('');
    			$('input[name*=socios_seleccionados]').each(function(){
    				var elem = $(this);
    				$("#socios-container").append('<input type="hidden" name="socios[]" value="' + elem.val() + '"/>');
    			});

    			$('.fancybox-close').click();
    			return false;
    			/*if($('#socio-finded').val() != 'false'){
    				if($('input[name=socios_seleccionados]').length == 0){
    					$('#socios-seleccionados').html('');
    				}

    				$('#socios-seleccionados').append('<div class="col-md-12" id="input-socio"><input type="hidden" name="socios_seleccionados[]" value="' + $('#socio-finded').val() + '" style="display:none"/><span>' + $('#socio-cedula').val() + ' - ' + $('#socio-nombre').val() + '</span><!--<a href="#" id="delete-socio" style="margin-left: 5px;padding: 1px 5px;background-color: #620000; color: #FFFFFF;">x</a>--></div>');

    		
      <!--		return false;
    			}
    			else{
	    			var elem = $(this);
	    			$.ajax({
	    				url: '{{ $route }}/socio',
	    				type: 'post',
	    				data: elem.serialize(),
	    				success: function(data){
		    				$('input[name=id_persona]').val(data.id);
		    				$('#form-display-socio-span').html(data.cedula + ' - ' + data.nombre);
		    				$('#form-display-socio').css({
		    					'display':'block'
		    				});
		    				$('#add-socio').css({
		    					'display':'none'
		    				});

		    				if($('input[name=socios_seleccionados]').length == 0){
		    					$('#socios-seleccionados').html('');
		    				}

    						$('#socios-seleccionados').append('<div class="col-md-12" id="input-socio"><input type="checkbox" name="socios_seleccionados[]" value="' + $('#socio-finded').val() + '" style="display:none"/><span>' + $('#socio-cedula').val() + ' - ' + $('#socio-nombre').val() + '</span><!--<a href="#" class="delete-socio" style="margin-left: 5px;padding: 1px 5px;background-color: #620000; color: #FFFFFF;">x</a>--></div>');
	    	
      <!--				console.log(data);
	    				},
	    				error: function(e){
	    					console.log(e);
	    				}
	    			});
	    			//console.log(elem.serialize());
	    			return false;
	    		}*/

	    		var socios = $('input[name=socios]').val();
    		});

      		$('#reset-socios').on('click', function(e){
      			e.preventDefault();
      			$('#socios-seleccionados').html('<em id="no-one-person" class="control-label col-md-12">(Ningún Socio Agregado)</em>');
      		})

        </script>