      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Añadir Representante
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">

              <div class="widget-content padded">
		        <form action="" method="post" class="form-horizontal" id="form-representante">
		        	<input id="representante-finded" type="hidden" name="finded" value="false">
					<div class="form-group">
			            <label class="control-label col-md-2" if=>Cédula</label>
			            <div class="col-md-7">
			              <input id="representante-cedula" class="form-control" placeholder="Escriba el apellido de la persona" name="cedula" type="text" required>
			            </div>
			        </div>
		          	<div class="form-group">
			            <label class="control-label col-md-2" if=>Nombre</label>
			            <div class="col-md-7">
			              <input id="representante-nombre" class="form-control" placeholder="Escriba el nombre de la persona" name="nombre" type="text" required/>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2" if=>Rif</label>
			            <div class="col-md-7">
			              <input id="representante-rif" class="form-control" placeholder="Escriba el usuario de la persona" name="rif" type="text" required>
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

			$('#representante-cedula').on('keyup', function(e){
				//console.log('encontrando a '+$(this).val());
				$.ajax({
    				url: '{{ $route }}/findrepresentante',
    				type: 'post',
    				data: {'cedula':$(this).val()},
    				success: function(data){
    					if(data != 0){
    						$('#representante-nombre').val(data.nombre);
    						$('#representante-nombre').attr('readonly', 'true');
    						$('#representante-rif').val(data.rif);
    						$('#representante-rif').attr('readonly', 'true');
    						$('#representante-finded').val(data.id);
    					}
    					else{
    						$('#representante-nombre').removeAttr('readonly');
    						$('#representante-rif').removeAttr('readonly');
    						$('#representante-finded').val('false');
    					}
    					console.log(data);
    				},
    				error: function(e){
    					console.log(e);
    				}
    			})
			});
    		$('#form-representante').on('submit', function(e){
    			if($('#representante-finded').val() != 'false'){
    				$('input[name=id_persona]').val($('#representante-finded').val());
    				$('#form-display-representante-span').html($('#representante-cedula').val() + ' - ' + $('#representante-nombre').val());
    				$('#form-display-representante').css({
    					'display':'block'
    				});
    				$('#add-representante').css({
    					'display':'none'
    				});
    				$('.fancybox-close').click();
    				return false;
    			}
    			else{
	    			var elem = $(this);
	    			$.ajax({
	    				url: '{{ $route }}/representante',
	    				type: 'post',
	    				data: elem.serialize(),
	    				success: function(data){
		    				$('input[name=id_persona]').val(data.id);
		    				$('#form-display-representante-span').html(data.cedula + ' - ' + data.nombre);
		    				$('#form-display-representante').css({
		    					'display':'block'
		    				});
		    				$('#add-representante').css({
		    					'display':'none'
		    				});
		    				$('.fancybox-close').click();
	    					console.log(data);
	    				},
	    				error: function(e){
	    					console.log(e);
	    				}
	    			});
	    			$('#fancybox-inner').html('<img src="/javascripts/fancybox/fancybox_loading.gif"/>');
	    			//console.log(elem.serialize());
	    			return false;
	    		}
    		});

        </script>