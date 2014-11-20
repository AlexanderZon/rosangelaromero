@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Edición de Personas
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
			            <label class="control-label col-md-2">Nombre</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el nombre de la persona" name="nombre" type="text" value="{{ $persona->nombre }}"/>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Cédula</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el apellido de la persona" name="cedula" type="text" value="{{ $persona->cedula }}">
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Rif</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el usuario de la persona" name="rif" type="text" value="{{ $persona->rif }}">
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
        <!-- end DataTables Example -->
        @stop