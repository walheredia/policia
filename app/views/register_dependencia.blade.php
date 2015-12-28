@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos de la nueva Dependencia</h1>

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
			<form action="{{ URL::asset('register_dependencia') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nombre: </small></p>
			  				<input type="text" class="form-control" placeholder="Nombre..." name="nombre" id="nombre" value="{{ Input::old('nombre') }}">
				  		</div>

						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Dirección: </small></p>
			  				<input type="text" class="form-control" placeholder="Dirección..." name="direccion" id="direccion" value="{{ Input::old('direccion') }}">
				  		</div>		  			
				  	</div>

				  	<div class="form-group">
						<div class="col-sm-12">
			  				<p class="help-block margin-bottom-cero"><small>Teléfono: </small></p>
			  				<input type="text" class="form-control" placeholder="Teléfono..." name="telefono" id="telefono" value="{{ Input::old('telefono') }}">
				  		</div>
				  	</div>

					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Registrar Dependencia" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop
