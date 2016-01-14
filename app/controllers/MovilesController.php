<?php
	class MovilesController extends BaseController {

	public function get_nuevo(){
		$modelos = ModeloMovil::all();
		return View::make('register_movil')->with('modelos', $modelos);
	}
	public function post_nuevo() {
		$inputs = Input::all();
		$reglas = array(
			'ro' => 'required|max:50', 
			'oi' => 'required|max:50',
			'dominio' => 'required|max:50',
			'modelo' => 'required|max:50',
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
	        $movil->save();
			return Redirect::to('lista_moviles')->with('error', 'El Móvil ha sido registrado con Éxito')->withInput();
		}
	}
	public function all_moviles() {
		$moviles = Movil::all();
		return View::make('lista_moviles')->with('moviles', $moviles);		
	}
}