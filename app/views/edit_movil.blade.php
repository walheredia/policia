@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Edicion de datos del Móvil</h1>

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
			<form action="{{ URL::asset('edit_movil') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>RO: </small></p>
			  				<input type="text" class="form-control" placeholder="Ingrese RO..." name="ro" id="ro" value=<?php echo $movil->ro;?>>
				  		</div>

						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>OI: </small></p>
			  				<input type="text" class="form-control" placeholder="Ingrese OI..." name="oi" id="oi" value=<?php echo $movil->oi;?>>
				  		</div>		  			
				  	</div>

				  	<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Dominio: </small></p>
			  				<input type="text" class="form-control" placeholder="Dominio..." name="dominio" id="dominio" value=<?php echo $movil->dominio;?>>
				  		</div>
				  		<div class="col-sm-6">
							<p class="help-block margin-bottom-cero"><small>Modelo:</small></p>
			  				<select class="form-control campo" name="modelo" id="modelo" data-val="modelo">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					@foreach ($modelos as $modelo)
			  						@if ($movil->modelo==$modelo->id)
			  							<option value="{{ $modelo->id }}" selected>{{ $modelo->modelo }}</option>
			  						@else
										<option value="{{ $modelo->id }}">{{ $modelo->modelo }}</option>
									@endif		                          
		                        @endforeach
		                    </select>
	                   	</div>	  			
				  	</div>

				  	<div class="form-group">
				  		<div class="col-sm-6">
				  			<p class="help-block margin-bottom-cero"><small>Eq. Radio:</small></p>
			  				<select class="form-control campo" name="radio" id="radio" data-val="radio">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					@foreach ($radios as $radio)
			  						@if ($movil->id_radio==$radio->id_radio)
			  							<option value="{{ $radio->id_radio }}" selected>{{ $radio->serie." ".$radio->display}}</option>
			  						@else
										<option value="{{ $radio->id_radio }}">{{ $radio->serie." ".$radio->display}}</option>
									@endif		                          
		                        @endforeach
		                    </select>
				  		</div>

				  		<div class="col-sm-4">
				  			<p class="help-block margin-bottom-cero"><small>Eq. AVL:</small></p>
			  				<select class="form-control campo" name="avl" id="avl" data-val="avl">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					@foreach ($avls as $avl)
			  						@if ($movil->id_avl==$avl->id_avl)
			  							<option value="{{ $avl->id_avl }}" selected>{{ $avl->serie." ".$avl->datatrack }}</option>
			  						@else
										<option value="{{ $avl->id_avl }}">{{ $avl->serie." ".$avl->datatrack }}</option>
									@endif		                          
		                        @endforeach
		                    </select>
				  		</div>	
				  		<div class="col-sm-2">
			  				<p class="help-block margin-bottom-cero"><small>ID: </small></p>
			  				<input type="text" class="form-control" placeholder="ID" name="id" id="id" value=<?php echo $movil->id_movil;?>>
				  		</div>			  		
				  	</div>

				  	<div class="form-group">
				  		<div class="col-sm-12">
				  			
				  		</div>
				  	</div>

					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Actualizar Móvil" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop
