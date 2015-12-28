<?php
	class EquiposAVLController extends BaseController {

	public function get_nuevo(){
		return View::make('register_avl');
	}
	public function post_nuevo() {
		$inputs = Input::all();
		$reglas = array(
			'serie' => 'required|max:50', 
			'datatrack' => 'required|max:50',
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
			$avl = new Avl;
			$avl->serie = Input::get('serie');
			$avl->datatrack = Input::get('datatrack');

	        $avl->save();
			return Redirect::to('lista_avls')->with('error', 'El Equipo AVL ha sido registrado con Éxito')->withInput();
		}
	}
		public function all_avls() {
		$avls = Avl::all();
		return View::make('lista_avls')->with('avls', $avls);
		
	}
}