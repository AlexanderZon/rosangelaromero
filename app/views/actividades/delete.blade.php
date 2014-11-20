@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Borrado de Actividades
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
			            <label class="control-label col-md-7">¿Usted está seguro que desea eliminada esta actividad {{ $actividad->descripcion }}?</label>
			            <div class="col-md-2">
			              	<input class="form-control" placeholder="" value="Si, estoy seguro" type="submit" style="display:inline-block">
			            </div>
			            <div class="col-md-2">
                			<a href="{{ $route }}" class="form-control"  style="display:inline-block;text-align:center">No, ir Atrás</a>
			            </div>
			        </div>
		        </form>
		      </div>
            </div>
          </div>
        </div>
        <!-- end DataTables Example -->
        @stop