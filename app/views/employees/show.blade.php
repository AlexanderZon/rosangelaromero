<div class="row" style="margin-top: 0">
  <div class="col-lg-12">
    <div class="widget-container fluid-height clearfix">
      <div class="widget-content padded">
        <p>
          <em>Empresa {{ $employee->codigo }}</em>
          <a href="{{ $route }}/reporte/{{ Crypt::encrypt($employee->id) }}" style="float:right" target="_blank">Imprimir Certificado</a>
        </p>
        <table class="table table-bordered table-striped editable-form" id="user" style="clear: both">
          <tbody>
            <tr>
              <td width="35%">
                Rif.
              </td>
              <td>
                <a data-original-title="Enter username" data-pk="1" data-type="text" href="#" id="username" class="editable editable-click">{{ $employee->rif }}</a>
              </td>
            </tr>
            <tr>
              <td width="35%">
                Nit.
              </td>
              <td>
                <a data-original-title="Enter username" data-pk="1" data-type="text" href="#" id="username" class="editable editable-click">{{ $employee->nit }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Nombre de la Empresa
              </td>
              <td>
                <a data-original-title="Enter your firstname" data-pk="1" data-placeholder="Required" data-placement="right" data-type="text" href="#" id="firstname" class="editable editable-click editable-empty">{{ $employee->nombre }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Representante
              </td>
              <td>
                <a data-original-title="Select sex" data-pk="1" data-type="select" data-value="" href="#" id="sex" class="editable editable-click">{{ $employee->representante->nombre}}</a>
              </td>
            </tr>
            <tr>
              <td>
                Dirección
              </td>
              <td>
                <a data-original-title="Select group" data-pk="1" data-source="/groups" data-type="select" data-value="5" href="#" id="group" class="editable editable-click">{{ $employee->direccion }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Municipio
              </td>
              <td>
                <a data-original-title="Select status" data-pk="1" data-source="/status" data-type="select" data-value="0" href="#" id="status" class="editable editable-click">{{ $employee->municipio->nombre }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Teléfono
              </td>
              <td>
                <a data-format="YYYY-MM-DD" data-original-title="Select Date of birth" data-pk="1" data-template="D / MMM / YYYY" data-type="combodate" data-value="1984-05-15" data-viewformat="DD/MM/YYYY" href="#" id="dob" class="editable editable-click">{{ $employee->telefono }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de Ingreso
              </td>
              <td>
                <a data-format="YYYY-MM-DD HH:mm" data-original-title="Setup event date and time" data-pk="1" data-template="D MMM YYYY  HH:mm" data-type="combodate" data-viewformat="MMM D, YYYY, HH:mm" href="#" id="event" class="editable editable-click editable-empty">{{ $employee->fecha_ingreso }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Capital
              </td>
              <td>
                <a data-original-title="Enter comments" data-pk="1" data-placeholder="Your comments here..." data-type="textarea" href="#" id="comments" class="editable editable-pre-wrapped editable-click">{{ $employee->capital }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Número de Registro
              </td>
              <td>
                <a data-original-title="Select fruits" data-type="checklist" data-value="2,3" href="#" id="fruits" class="editable editable-click">{{ $employee->registro->numero }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de Registro
              </td>
              <td>
                <a data-original-title="Select country" data-pk="1" data-type="select2" data-value="BS" href="#" id="country" class="editable editable-click">{{ $employee->registro->fecha }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Número de SNC
              </td>
              <td>
                <a data-original-title="Enter tags" data-pk="1" data-type="select2" href="#" id="tags" class="editable editable-click editable-empty">{{ $employee->snc->numero }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de SNC
              </td>
              <td>
                <a data-original-title="Enter tags" data-pk="1" data-type="select2" href="#" id="tags" class="editable editable-click editable-empty">{{ $employee->snc->fecha }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Número de Ince
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->ince->numero }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de Ince
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->ince->fecha }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Número de ISLR
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->islr->numero }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de ISLR
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->islr->fecha }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Número de Patente
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->patente->numero }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de Patente
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->patente->fecha }}</a>
              </td>
            </tr>
            <tr>
              <td>
                IVSS
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->seguro->numero }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de IVSS
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->seguro->fecha }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Número de Solvencia Municipal
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->solmuni->licencia }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de Solvencia Municipal 
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->solmuni->fecha }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Colgio de Ingenieros
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->coling->numero }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Fecha de Colegio de Ingenieros  
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->coling->fecha }}</a>
              </td>
            </tr>
            <tr>
              <td>
                Provisional
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->provisional ? 'Si' : 'No' }}</a>
              </td>
            </tr>
            @if($employee->provisional)
            <tr>
              <td>
                Días Provisional
              </td>
              <td>
                <a data-original-title="Please, fill address" data-pk="1" data-type="address" href="#" id="address" class="editable editable-click">{{ $employee->dias_provicional }}</a>
              </td>              
            </tr>            
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>