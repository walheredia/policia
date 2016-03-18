<?php
	class MovilDependenciaController extends BaseController {

	public function get_nuevo(){

		$dependencias = Dependencia::all();
		$moviles = Movil::all();
		
		$movildependencias = DB::table('dependencias_moviles')
		->join('dependencias', 'dependencias_moviles.id_dependencia', '=', 'dependencias.id_dependencia')
		->join('moviles', 'dependencias_moviles.id_movil', '=', 'moviles.id_movil')
		->select('dependencias.nombre', 'dependencias.id_dependencia', 'dependencias.direccion', 'moviles.dominio', 'moviles.modelo')
		->orderby('dependencias.id_dependencia', 'asc')
		->get();

		return View::make('register_movil_dependencia')->with('dependencias', $dependencias)
														->with('moviles', $moviles)
														->with('movildependencias', $movildependencias);
	}

	public function post_nuevo(){
		$inputs = Input::all();
		$reglas = array(
			'dependencia' => 'required', 
			'movil' => 'required',
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
			$movdep = new MovilDependencia;
			$movdep->id_dependencia = Input::get('dependencia');
			$movdep->id_movil = Input::get('movil');			
			
	        $movdep->save();

	        $dependencias = Dependencia::all();
			$moviles = Movil::all();
			$movildependencias = DB::table('dependencias_moviles')
			->join('dependencias', 'dependencias_moviles.id_dependencia', '=', 'dependencias.id_dependencia')
			->join('moviles', 'dependencias_moviles.id_movil', '=', 'moviles.id_movil')
			->select('dependencias.nombre', 'dependencias.id_dependencia', 'dependencias.direccion', 'moviles.dominio', 'moviles.modelo')
			->orderby('dependencias.id_dependencia', 'asc')
			->get();
			return View::make('register_movil_dependencia')->with('ok', 'La Asignación ha sido registrada con Éxito')
														->with('dependencias', $dependencias)
														->with('moviles', $moviles)
														->with('movildependencias', $movildependencias);
		}
	}
	
}