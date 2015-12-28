@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos del nuevo Equipo AVL</h1>

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
			<form action="{{ URL::asset('register_avl') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Serie: </small></p>
			  				<input type="text" class="form-control" placeholder="Serie..." name="serie" id="serie" value="{{ Input::old('serie') }}">
				  		</div>

						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Datatrack: </small></p>
			  				<input type="text" class="form-control" placeholder="Datatrack..." name="datatrack" id="datatrack" value="{{ Input::old('oi') }}">
				  		</div>		  			
				  	</div>

					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Registrar AVL" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop
