@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Usuarios
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
                <a href="/usuarios/create"><i class="icon-user"></i>Añadir Nuevo Usuario</a>
              </div>
              <div class="widget-content padded clearfix">
                <table class="table table-bordered table-striped" id="dataTable1">
                  <thead>
                    <th class="check-header hidden-xs">
                      <label><input id="checkAll" name="checkAll" type="checkbox"><span></span></label>
                    </th>
                    <th>
                      Nombre
                    </th>
                     <th>
                      Apellido
                    </th>
                    <th>
                      Usuario
                    </th>
                     <th>
                      Tipo
                    </th>
                    <th class="hidden-xs">
                      Creado
                    </th>
                    <th class="hidden-xs">
                      Actualizado
                    </th>
                    <th class="hidden-xs">
                      Acciones
                    </th>
                  </thead>
                  <tbody>
                  @foreach( $users as $user )
                    <tr>
                      <td class="check hidden-xs">
                        <label><input name="optionsRadios1" type="checkbox" value="option1"><span></span></label>
                      </td>
                      <td>
                        {{ $user->first_name }}
                      </td>
                      <td class="hidden-xs">
                        {{ $user->last_name }}
                      </td>
                      <td class="hidden-xs">
                        {{ $user->username }}
                      </td>
                      <td class="hidden-xs">
                        {{ $user->type == 'administrator' ? 'Administrador' : 'Operador' }}
                      </td>
                      <td class="hidden-xs">
                        {{ $user->created_at }}
                      </td>
                      <td class="hidden-xs">
                        {{ $user->updated_at }}
                      </td>
                      <td class="actions">
                        <div class="action-buttons">
                        @if($user->type != 'administrator')
                          <a class="table-actions" href="{{ $route }}/edit/{{ Crypt::encrypt($user->id) }}"><i class="icon-pencil"></i></a>
                          <a class="table-actions" href="{{ $route }}/delete/{{ Crypt::encrypt($user->id) }}"><i class="icon-trash"></i></a>
                        @else
                          <em style="font-size:8pt">Administrador</em>
                        @endif
                        </div>
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
        @stop