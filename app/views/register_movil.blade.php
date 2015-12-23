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
			  				<p class="help-block margin-bottom-cero"><small>Nombre: </small></p>
			  				<input type="text" class="form-control" placeholder="Nombre..." name="first_name" id="first_name" value="{{ Input::old('first_name') }}">
				  		</div>

						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Apellido: </small></p>
			  				<input type="text" class="form-control" placeholder="Apellido..." name="last_name" id="last_name" value="{{ Input::old('last_name') }}">
				  		</div>	  			
				  	</div>

					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Registrar Usuario" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop
