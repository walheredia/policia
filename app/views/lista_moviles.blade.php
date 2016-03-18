@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Móviles</h3>
		@if(Session::has('error'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('error') }}
              </ul>
            </div>
        @endif
		<table class="table table-bordered table-hover" style="font-size: 12px;">
			<thead>
				<tr>
			  		<th>ID Móvil</th>
			  		<th>RO</th>
			 		<th>OI</th>
			 		<th>Dominio</th>
			 		<th>Modelo</th>
			  		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($moviles as $movil)
				<tr>
					<td>{{ $movil->id_movil }}</td>
					<td>{{ $movil->ro }}</td>
			 		<td>{{ $movil->oi }}</td>
			 		<td>{{ $movil->dominio }}</td>
			 		<td>{{ $movil->modelo }}</td>
			 		<td><a href="{{ action('MovilesController@getEditMovil', $movil->id_movil) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('MovilesController@destroy', $movil->id_movil) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
          </a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
