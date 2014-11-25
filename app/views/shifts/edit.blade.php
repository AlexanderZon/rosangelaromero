@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Edición de Turno
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
			              <input class="form-control" placeholder="Escriba el nombre del turno" name="title" type="text" value="{{ $shift->title }}"/>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Siglas</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Indique las siglas del turno" name="prefix" type="text" value="{{ $shift->prefix }}">
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