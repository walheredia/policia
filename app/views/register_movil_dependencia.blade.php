@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Asignaciones</h1>

		<div class="col-md-10 col-md-offset-1 text-left">
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
