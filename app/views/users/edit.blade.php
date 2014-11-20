@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Creación de Usuarios
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
                <a href="/usuarios"><i class="icon-user"></i>Ir Atrás</a>
              </div>

              <div class="widget-content padded">
		        <form action="" method="post" class="form-horizontal">
		          <div class="form-group">
			            <label class="control-label col-md-2">Nombre</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el nombre de la persona" name="first_name" type="text" value="{{ $user->first_name }}"/>
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Apellido</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el apellido de la persona" name="last_name" type="text" value="{{ $user->last_name }}">
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Usuario</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el usuario de la persona" name="username" type="text" value="{{ $user->username }}">
			            </div>
			        </div>
					<div class="form-group">
			            <label class="control-label col-md-2">Correo</label>
			            <div class="col-md-7">
			              <input class="form-control" placeholder="Escriba el usuario de la persona" name="email" type="email" value="{{ $user->email }}">
			            </div>
			        </div>
			        @if(isset($error) AND $error == 'clave_error')
						<div class="form-group has-error">
				            <label class="control-label col-md-2">Contraseña</label>
				            <div class="col-md-7">
				              <input class="form-control" placeholder="Escriba la contraseña del usuario" name="password" type="password">
				            </div>
				        </div>
						<div class="form-group has-error">
				            <label class="control-label col-md-2">Repetir Contraseña</label>
				            <div class="col-md-7">
				              <input class="form-control" placeholder="Escriba la contraseña del usuario" name="password_2" type="password">
				            </div>
				        </div>
			        @else
						<div class="form-group">
				            <label class="control-label col-md-2">Contraseña</label>
				            <div class="col-md-7">
				              <input class="form-control" placeholder="Escriba la contraseña del usuario" name="password" type="password">
				            </div>
				        </div>
						<div class="form-group">
				            <label class="control-label col-md-2">Repetir Contraseña</label>
				            <div class="col-md-7">
				              <input class="form-control" placeholder="Escriba la contraseña del usuario" name="password_2" type="password">
				            </div>
				        </div>
			        @endif
			        <div class="form-group">
			            <label class="control-label col-md-2">Tipo de Usuario</label>
			            <div class="col-md-7">
			              <select class="form-control" name="type">
			              	<option value="administrator" {{ $user->tipo == 'administrador' ? 'selected' : '' }}>Administrador</option>
			              	<option value="operator" {{ $user->tipo == 'operador' ? 'selected' : '' }}>Operador</option>
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
        <!-- end DataTables Example -->
        @stop