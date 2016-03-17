<?php
	class MovilDependenciaController extends BaseController {

	public function get_nuevo(){
		$dependencias = Dependencia::all();
		$moviles = movil::all();
		return View::make('register_movil_dependencia')->with('dependencias', $dependencias)
														->with('moviles', $moviles);
	}

	public function post_nuevo(){
		return View::make('register_movil_dependencia');
	}
	
}