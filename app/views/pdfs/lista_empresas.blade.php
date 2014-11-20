<img src="/images/etiqueta.png" width="100%" height="45">
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Empresas
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          </div>
          <div class="col-sm-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
                
                
              
              </div>
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" id="dataTable1">
                  <thead>
                  	<tr>
                      <th>
                        Codigo
                      </th>
                      <th>
                        Nombre
                      </th>
	                     <th>
	                      Representante
	                    </th>

	                     <th>
	                      Direccion
	                    </th>
	                    <th>
	                      Rif
	                    </th>
	                    <th>
	                      Telefono
	                    </th>
	                   
	                    <th>
	                      Creado el 
	                    </th>
	                    <th>
	                      Actualizado el
	                    </th>
	                </tr>
                  </thead>
                  <tbody>
                  @foreach( $empresas as $empresa )
                    <tr>
                      <td>
                        {{ $empresa->codigo }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->nombre }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->representante->nombre }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->direccion }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->rif }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->telefono }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->created_at }}
                      </td>
                      <td class="hidden-xs">
                        {{ $empresa->updated_at }}
                      </td>
                    </tr>
                   
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
        <!-- end DataTables Example -->
