@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos del nuevo equipo de Radio</h1>

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
			<form action="{{ URL::asset('register_radio') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Serie: </small></p>
			  				<input type="text" class="form-control" placeholder="Serie..." name="serie" id="serie" value="{{ Input::old('serie') }}">
				  		</div>

						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Display: </small></p>
			  				<input type="text" class="form-control" placeholder="Display..." name="display" id="display" value="{{ Input::old('display') }}">
				  		</div>		  			
				  	</div>

				  	<div class="form-group">

						<div class="col-sm-12">
			  				<p class="help-block margin-bottom-cero"><small>Modelo: </small></p>
			  				<input type="text" class="form-control" placeholder="Modelo..." name="modelo" id="modelo" value="{{ Input::old('modelo') }}">
				  		</div>	  			
				  	</div>

					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Registrar Radio" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop
