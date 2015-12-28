@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Equipos de Radio</h3>
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
			  		<th>ID Radio</th>
			  		<th>Serie</th>
			 		<th>Display</th>
			 		<th>Modelo</th>
			  		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($radios as $radio)
				<tr>
					<td>{{ $radio->id_radio }}</td>
					<td>{{ $radio->serie }}</td>
			 		<td>{{ $radio->display }}</td>
			 		<td>{{ $radio->modelo }}</td>
			 		<td><a href="{{ action('UsuariosController@getEditUsuario', $radio->id_radio) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('UsuariosController@destroy', $radio->id_radio) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
          </a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
