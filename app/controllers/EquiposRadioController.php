<?php
	class EquiposRadioController extends BaseController {

	public function get_nuevo(){
		$modelos = ModeloRadio::all();
		return View::make('register_radio')->with('modelos', $modelos);
	}
	public function post_nuevo() {
		$inputs = Input::all();
		$reglas = array(
			'serie' => 'required|max:50', 
			'display' => 'required|max:50',
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
			$radio = new Radio;
			$radio->serie = Input::get('serie');
			$radio->display = Input::get('display');
			$radio->modelo = Input::get('modelo');
	        $radio->save();
			return Redirect::to('lista_radios')->with('error', 'El Equipo de Radio ha sido registrado con Éxito')->withInput();
		}
	}
	public function all_radios() {
		$radios = Radio::all();
		return View::make('lista_radios')->with('radios', $radios);
		
	}
}