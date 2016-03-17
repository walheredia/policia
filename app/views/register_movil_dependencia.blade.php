@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Asignaciones</h1>

		<div class="col-md-10 col-md-offset-1 text-left">
			@if(Session::has('ok'))
	            <div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">&times;</button>
	                {{ Session::get('ok') }}
	              </ul>
	            </div>
	        @endif
			@if ($errors->any())
			    <div class="alert alert-danger">
			      <button type="button" class="close" data-dismiss="alert">&times;</button>
			      <strong>Por favor corrige los siguentes errores:</strong>
			      <ul>
			      @foreach ($errors->all() as $error)
			        <li>{{ $error }}</li>
			      @endforeach
			      </ul>
			    </div>
			@endif
			<form action="{{ URL::asset('register_movil_dependencia') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
							<p class="help-block margin-bottom-cero"><small>Dependencia:</small></p>
			  				<select class="form-control campo" name="dependencia" id="dependencia" data-val="dependencia">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					@foreach ($dependencias as $dependencia)
		                          <option value="{{ $dependencia->id_dependencia }}">{{ $dependencia->nombre." ".$dependencia->direccion }}</option>
		                        @endforeach
		                    </select>
	                   	</div>
	                   	<div class="col-sm-6">
							<p class="help-block margin-bottom-cero"><small>Móvil:</small></p>
			  				<select class="form-control campo" name="movil" id="movil" data-val="movil">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					@foreach ($moviles as $movil)
		                          <option value="{{ $movil->id_movil }}">{{ $movil->dominio." ".$movil->modelo }}</option>
		                        @endforeach
		                    </select>
	                   	</div>		  			
				  	</div>
				</fieldset>
				<fieldset class="cool-fieldset">
					<h3 class="row text-center">Móviles Asignados</h3>
					<div class="form-group">
						<div class="col-sm-12">
							<table class="table table-bordered table-hover" style="font-size: 12px;">
								<thead>
									<tr>
								  		<th>ID Dependencia</th>
								  		<th>ID Movil</th>
					  					<th>Eliminar</th>
									</tr>
								</thead>
						  		<tbody>
						  			@foreach($movildependencias as $movildependencia)
									<tr>
										<td>{{ $movildependencia->id_dependencia }}</td>
										<td>{{ $movildependencia->id_movil }}</td>
										<td><a href="{{ action('UsuariosController@destroy', $movildependencia->id_dependencia) }}"><span class="glyphicon glyphicon-remove"></a></span></td>
									</tr>
									@endforeach
						  		</tbody>	
							</table>
						</div>						
					</div>
					<div class="form-group">					
						<div class="col-sm-12">
							<input type="submit" value="Registrar Asignación" class="btn btn-success form-control">
						</div>
					</div>
				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop
