<?php
	class DependenciasController extends BaseController {

	public function get_nuevo(){
		return View::make('register_dependencia');
	}
	public function post_nuevo() {
		$inputs = Input::all();
		$reglas = array(
			'nombre' => 'required|max:50', 
			'direccion' => 'required|max:50',
			'telefono' => 'required|max:50',
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
			$dependencia = new Dependencia;
			$dependencia->nombre = Input::get('nombre');
			$dependencia->direccion = Input::get('direccion');
			$dependencia->telefono = Input::get('telefono');
			
	        $dependencia->save();
			return Redirect::to('lista_dependencias')->with('error', 'La dependencia ha sido registrada con Éxito')->withInput();
		}
	}
	public function all_dependencias() {
		$dependencias = Dependencia::all();
		return View::make('lista_dependencias')->with('dependencias', $dependencias);
		
	}
}