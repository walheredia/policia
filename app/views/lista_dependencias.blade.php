@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Dependencias</h3>
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
			  		<th>ID Dependencia</th>
			  		<th>Nombre</th>
			 		<th>Dirección</th>
			  		<th>Teléfono</th>
			  		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($dependencias as $dependencia)
				<tr>
					<td>{{ $dependencia->id_dependencia }}</td>
					<td>{{ $dependencia->nombre }}</td>
			 		<td>{{ $dependencia->direccion }}</td>
			 		<td>{{ $dependencia->telefono }}</td>
			 		<td><a href="{{ action('UsuariosController@getEditUsuario', $dependencia->id_dependencia) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('UsuariosController@destroy', $dependencia->id_dependencia) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
          </a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
