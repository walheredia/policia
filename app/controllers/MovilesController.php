<?php
	class MovilesController extends BaseController {

	public function get_nuevo(){
		$modelos = ModeloMovil::all();
		$radios = Radio::all();
		$avls = Avl::all();
		return View::make('register_movil')->with('modelos', $modelos)
											->with('radios', $radios)
											->with('avls', $avls);
	}
	public function post_nuevo() {
		$inputs = Input::all();
		$reglas = array(
			'ro' => 'required|max:50|unique:moviles,ro', 
			'oi' => 'required|max:50|unique:moviles,oi',
			'dominio' => 'required|max:50|unique:moviles,dominio',
			'modelo' => 'required|max:50',
			'radio' => 'unique:moviles,id_radio',
			'avl' => 'unique:moviles,id_avl',
		);
		$mensajes = array(
			'required' => 'Campo Obligatorio',
		);
		$validar = Validator::make($inputs, $reglas);
		if($validar->fails())
		{	
			Input::flash();
			return Redirect::back()->withInput()->withErrors($validar);
		}
		else
		{
			$movil = new Movil;
			$movil->ro = Input::get('ro');
			$movil->oi = Input::get('oi');
			$movil->dominio = Input::get('dominio');
			$movil->modelo = Input::get('modelo');
			$movil->id_radio = Input::get('radio');
			$movil->id_avl = Input::get('avl');
	        $movil->save();
			return Redirect::to('lista_moviles')->with('error', 'El Móvil ha sido registrado con Éxito')->withInput();
		}
	}
	public function destroy($id_movil){
		$movil= Movil::find($id_movil);	        
        if (is_null ($movil))
        {
            App::abort(404);
        }
        $movildep = DB::table('dependencias_moviles')->where('id_movil', $id_movil)->pluck('id_movil');
        if (is_null($movildep)) {
        	$movil->delete();
	        $moviles = Movil::all();
			return View::make('lista_moviles')->with('moviles', $moviles);
        }
        else
        	{
        		return Redirect::to('lista_moviles')->with('error', 'El Móvil no puede ser eliminado porque se encuentra asignado a una dependencia')->withInput();
        	}
        
	}
	public function getEditMovil($id_movil) {
		$movil= Movil::find($id_movil);
		if (is_null ($movil))
		{
			App::abou(404);
		}
		$modelos = ModeloMovil::all();
		$radios = Radio::all();
		$avls = Avl::all();
		return View::make('edit_movil')->with('movil', $movil)
											->with('modelos', $modelos)
											->with('radios', $radios)
											->with('avls', $avls);
	}

	public function update() {
		$inputs = Input::all();
		$reglas = array(
			'ro' => 'required|max:50', 
			'oi' => 'required|max:50',
			'dominio' => 'required|max:50',
			'modelo' => 'required|max:50',
			'radio' => 'required',
			'avl' => 'required',
		);
		$mensajes = array(
			'required' => 'Campo Obligatorio',
		);
		$validar = Validator::make($inputs, $reglas);
		if($validar->fails())
		{	
			Input::flash();
			return Redirect::back()->withInput()->withErrors($validar);
		}
		else
		{
			$id_movil = Input::get('id');
			$movil = Movil::find($id_movil);
			$movil->ro = Input::get('ro');
			$movil->oi = Input::get('oi');
			$movil->dominio = Input::get('dominio');
			$movil->modelo = Input::get('modelo');
			$movil->id_radio = Input::get('radio');
			$movil->id_avl = Input::get('avl');
	        $movil->save();
			return Redirect::to('lista_moviles')->with('error', 'El Móvil ha sido Actualizado con Éxito')->withInput();
		}
	}
	public function all_moviles() {
		$moviles = Movil::all();
		return View::make('lista_moviles')->with('moviles', $moviles);		
	}
}