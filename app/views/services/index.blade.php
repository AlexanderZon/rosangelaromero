@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Servicios
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
                <a href="{{ $route }}/create"><i class="icon-user"></i>Añadir Nuevo Servicio</a>
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
                      Empleados Requeridos
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
                  @foreach( $services as $service )
                    <tr>
                      <td class="check hidden-xs">
                        <label><input name="optionsRadios1" type="checkbox" value="option1"><span></span></label>
                      </td>
                      <td>
                        {{ $service->name }}
                      </td>
                      <td class="hidden-xs">
                        {{ $service->employees_required }}
                      </td>
                      <td class="hidden-xs">
                        {{ $service->created_at }}
                      </td>
                      <td class="hidden-xs">
                        {{ $service->updated_at }}
                      </td>
                      <td class="actions">
                        <div class="action-buttons">
                          <a class="table-actions" href="{{ $route }}/edit/{{ Crypt::encrypt($service->id) }}"><i class="icon-pencil"></i></a>
                          <a class="table-actions" href="{{ $route }}/delete/{{ Crypt::encrypt($service->id) }}"><i class="icon-trash"></i></a>
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