@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos del nuevo Móvil</h1>

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
			<form action="{{ URL::asset('register_movil') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>RO: </small></p>
			  				<input type="text" class="form-control" placeholder="Ingrese RO..." name="ro" id="ro" value="{{ Input::old('ro') }}">
				  		</div>

						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>OI: </small></p>
			  				<input type="text" class="form-control" placeholder="Ingrese OI..." name="oi" id="oi" value="{{ Input::old('oi') }}">
				  		</div>		  			
				  	</div>

				  	<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Dominio: </small></p>
			  				<input type="text" class="form-control" placeholder="Dominio..." name="dominio" id="dominio" value="{{ Input::old('dominio') }}">
				  		</div>
				  		<div class="col-sm-6">
							<p class="help-block margin-bottom-cero"><small>Modelo:</small></p>
			  				<select class="form-control campo" name="modelo" id="modelo" data-val="modelo">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					@foreach ($modelos as $modelo)
		                          <option value="{{ $modelo->id }}">{{ $modelo->modelo }}</option>
		                        @endforeach
		                    </select>
	                   	</div>	  			
				  	</div>

					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Registrar Móvil" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop
