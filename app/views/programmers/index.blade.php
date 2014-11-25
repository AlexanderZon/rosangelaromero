@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Programador de Jornadas
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <!-- <div class="heading">
                <a href="{{ $route }}/create"><i class="icon-user"></i>Añadir Nuevo Turno</a>
              </div> -->
              <div class="widget-content padded clearfix">
                <table class="table table-filters">
                <thead>
                  <tr>
                    <th>
                      Cedula
                    </th>
                    <th>
                      Empleado
                    </th>
                    @foreach( $dates as $date )
                      <th width="65" class="day-month">
                        {{ $date }}
                      </th>
                    @endforeach
                    <!-- <th>
                      Vendor
                    </th>
                    <th>
                      Total
                    </th>
                    <th class="hidden-sm hidden-xs">
                      Contact
                    </th>
                    <th class="hidden-xs">
                      Growth
                    </th>
                    <th>
                      % Change
                    </th> -->
                  </tr>
                </thead>
                <tbody>
                  @foreach( $employees as $employee )
                  <tr>
                    <td>
                      {{ $employee->identification_number }}
                    </td>
                    <td>
                      {{ $employee->first_name . ' ' . $employee->last_name }}
                    </td>
                    @foreach( $dates as $date )
                      <?php $color = 'blue' ?>
                      @foreach( $employee->programmersFortnight as $programmer)
                        @if($programmer->program_date == $date)
                         <?php $color = 'red' ?>
                        @endif
                      @endforeach
                      <td class="filter-category {{ $color}}">
                        <div class="arrow-left"></div>
                        <i class="fa icon-stethoscope"></i>
                      </td>
                    @endforeach
                  @endforeach
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
        <!-- end DataTables Example -->
        @stop
