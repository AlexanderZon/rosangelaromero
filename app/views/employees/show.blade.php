<div class="row" style="margin-top: 0">
  <div class="col-lg-12">
    <div class="widget-container fluid-height clearfix">
      <div class="widget-content padded">
        <p>
          <em>Empleado: {{ $employee->first_name }} {{ $employee->last_name }}</em>
          <!-- <a href="{{ $route }}/reporte/{{ Crypt::encrypt($employee->id) }}" style="float:right" target="_blank">Imprimir Reporte</a> -->
        </p>
        <table class="table table-bordered table-striped editable-form" id="user" style="clear: both">
          <tbody>
            <tr>
              <td width="35%">
                Nombre
              </td>
              <td>
                <a data-original-title="Enter username" data-pk="1" data-type="text" href="#" id="username" class="editable editable-click">{{ $employee->first_name }}</a>
              </td>
            </tr>
            <tr>
              <td width="35%">
                Apellido
              </td>
              <td>
                <a data-original-title="Enter username" data-pk="1" data-type="text" href="#" id="username" class="editable editable-click">{{ $employee->last_name }}</a>
              </td>
            </tr>
            <tr>
              <td width="35%">
                Cédula
              </td>
              <td>
                <a data-original-title="Enter username" data-pk="1" data-type="text" href="#" id="username" class="editable editable-click">{{ $employee->identification_number }}</a>
              </td>
            </tr>
            <tr>
              <td width="35%">
                Sexo
              </td>
              <td>
                <a data-original-title="Enter username" data-pk="1" data-type="text" href="#" id="username" class="editable editable-click">{{ $employee->sex }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Edad
              </td>
              <td>
                <a data-original-title="Select sex" data-pk="1" data-type="select" data-value="" href="#" id="sex" class="editable editable-click">{{ $age }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de Nacimiento
              </td>
              <td>
                <a data-original-title="Enter your firstname" data-pk="1" data-placeholder="Required" data-placement="right" data-type="text" href="#" id="firstname" class="editable editable-click editable-empty">{{ date('d-m-Y', strtotime($employee->born_date)) }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Lugar de Nacimiento
              </td>
              <td>
                <a data-original-title="Enter your firstname" data-pk="1" data-placeholder="Required" data-placement="right" data-type="text" href="#" id="firstname" class="editable editable-click editable-empty">{{ $employee->born_place }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Estado Civil
              </td>
              <td>
                <a data-original-title="Select group" data-pk="1" data-source="/groups" data-type="select" data-value="5" href="#" id="group" class="editable editable-click">{{ $employee->marital_status }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Carga Familiar
              </td>
              <td>
                <a data-original-title="Select status" data-pk="1" data-source="/status" data-type="select" data-value="0" href="#" id="status" class="editable editable-click">{{ $employee->familiar_burden }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Número de Hijos
              </td>
              <td>
                <a data-format="YYYY-MM-DD" data-original-title="Select Date of birth" data-pk="1" data-template="D / MMM / YYYY" data-type="combodate" data-value="1984-05-15" data-viewformat="DD/MM/YYYY" href="#" id="dob" class="editable editable-click">{{ $employee->children_number }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Grado de Instrucción
              </td>
              <td>
                <a data-format="YYYY-MM-DD HH:mm" data-original-title="Setup event date and time" data-pk="1" data-template="D MMM YYYY  HH:mm" data-type="combodate" data-viewformat="MMM D, YYYY, HH:mm" href="#" id="event" class="editable editable-click editable-empty">{{ $employee->training_degree }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de Ingreso
              </td>
              <td>
                <a data-original-title="Enter comments" data-pk="1" data-placeholder="Your comments here..." data-type="textarea" href="#" id="comments" class="editable editable-pre-wrapped editable-click">{{ date('d-m-Y', strtotime($employee->admission_date)) }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Teléfono
              </td>
              <td>
                <a data-original-title="Select fruits" data-type="checklist" data-value="2,3" href="#" id="fruits" class="editable editable-click">{{ $employee->phone }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Dirección
              </td>
              <td>
                <a data-original-title="Select country" data-pk="1" data-type="select2" data-value="BS" href="#" id="country" class="editable editable-click">{{ $employee->address }}</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>