<?php
	class MovilDependenciaController extends BaseController {

	public function get_nuevo(){
		$dependencias = Dependencia::all();
		return View::make('register_movil_dependencia')->with('dependencias', $dependencias);
	}

	public function post_nuevo(){
		return View::make('register_movil_dependencia');
	}
	
}