@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Equipos AVL</h3>
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
			  		<th>ID AVL</th>
			  		<th>Serie</th>
			 		<th>DataTrack</th>
			  		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($avls as $avl)
				<tr>
					<td>{{ $avl->id_avl }}</td>
					<td>{{ $avl->serie }}</td>
			 		<td>{{ $avl->datatrack }}</td>
			 		<td><a href="{{ action('UsuariosController@getEditUsuario', $avl->id_avl) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('UsuariosController@destroy', $avl->id_avl) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
          </a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
