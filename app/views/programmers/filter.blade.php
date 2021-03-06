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
              <div class="form-group" style="display:block;float:right;background-color:#EEEEEE;padding:1em;margin:.5em;border-radius:5px;width:100%">
                <form action="{{ $route }}" method="post">
                  <div class="col-sm-6"></div>
                  <label class="control-label col-md-3" style="font-size:12pt;padding-top:.5em;">Indique el intervalo de 5 días a partir de:</label>
                  <div class="col-sm-2">
                    <div class="input-group date datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy">
                      <input class="form-control" type="text" name="from" value="{{ $from }}" required><span class="input-group-addon"><i class="icon-calendar"></i></span>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <button type="submit" class="btn btn-info"><i class="fa icon-cloud-download"></i>Filtrar</button>
                  </div>
                </form>
              </div>
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
                      <th width="75" class="day-month">
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
                      <?php $color = 'inactive' ?>
                      <?php $prog = null ?>
                      @foreach( $employee->programs as $programmer)
                        @if($programmer->program_date == $date)
                          <?php $prog = $programmer->id; ?>
                          @if($programmer->shift->fault)
                            <?php $color = 'red' ?>
                          @else
                            <?php $color = 'blue' ?>
                          @endif
                        @endif
                      @endforeach
                      <td class="filter-category {{ $color }}" data-coord="{{ $employee->id}}-{{ $date }}">
                        <div class="arrow-left"></div>
                        @if($color == 'inactive')
                          <a href="{{ $route }}/program/{{ Crypt::encrypt($employee->id) }}/{{ Crypt::encrypt($date) }}/" class="fancybox fancybox.ajax">
                            <i class="fa {{ $color == 'inactive' ? 'icon-screenshot' : 'icon-edit'}}"></i>
                          </a>
                        @else
                          <a href="{{ $route }}/reprogram/{{ Crypt::encrypt($prog) }}" class="fancybox fancybox.ajax">
                            <i class="fa icon-edit"></i>
                          </a>
                        @endif
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
        <style type="text/css">
          a.fancybox{
            text-decoration: none;
            color: #fff;
          }
        </style>
        @stop
