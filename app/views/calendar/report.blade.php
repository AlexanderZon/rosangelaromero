<!-- <div>
	<img src="/images/logo.jpg">
	<span>Guadianes Guarfeca C.A.</span>
</div> -->

<table class="table table-filters">
<thead>
  <tr>
    <th width="15" style="background-color:#aeaea9;color:#333">
      Cedula
    </th>
    <th width="20" style="background-color:#aeaea9;color:#333">
      Empleado
    </th>
    @foreach( $dates as $date )
      <th width="15" class="day-month" style="text-align:center;background-color:#aeaea9;">
        {{ date('d/m', strtotime($date)) }}
      </th>
    @endforeach
    <th style="background-color:#aeaea9;color:#333;text-align:center">
    	Horas
    </th>
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
	  	<?php $hours = 0 ?>
		<tr>
		    <td style="background-color:#8e8e89;color:#eee;">
		      	{{ $employee->identification_number }}
		    </td>
		    <td style="background-color:#8e8e89;color:#eee;">
		      	{{ $employee->first_name . ' ' . $employee->last_name }}
		    </td>
		    @foreach( $dates as $date )
		      	<?php $color = 'inactive' ?>
		      	<?php $prog = null ?>
		      	@foreach( $employee->programs as $programmer)
		        	@if($programmer->program_date == $date)
		          		<?php 
		          			$prog = $programmer; 
		          			$hours += $programmer->shift->hours;
		          		?>
		          		@if($programmer->shift->fault)
		            		<?php $color = 'red' ?>
		          		@else
		            		<?php $color = 'blue' ?>
		          		@endif
		        	@endif
		      	@endforeach
		      	@if($color == 'red')
		      		<td class="filter-category {{ $color }}" style="background-color:#D95347;text-align:center;color:#eee;" data-coord="{{ $employee->id}}-{{ $date }}">
		      	@elseif($color == 'blue')
		      		<td class="filter-category {{ $color }}" style="background-color:#5347D9;text-align:center;color:#eee;" data-coord="{{ $employee->id}}-{{ $date }}">
		      	@else
		      		<td class="filter-category {{ $color }}" style="background-color:#8e8e89;text-align:center;color:#eee;" data-coord="{{ $employee->id}}-{{ $date }}">
		      	@endif
	        	@if($color == 'inactive')
	            	{{ '-----' }}
	        	@else
	        		{{ utf8_decode($prog->shift->prefix) }} {{ utf8_decode($prog->service['name']) }}
	        	@endif
		      	</td>
		    @endforeach
		    <td style="background-color:#53D947;text-align:center;color:#eee;">
		      	{{ $hours }}
		    </td>
		</tr>
  	@endforeach
</tbody>
</table>