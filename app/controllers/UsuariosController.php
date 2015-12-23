<?php

	class UsuariosController extends BaseController {

	public function get_nuevo(){
		return View::make('register');
	}
	
	public function post_nuevo()
	{
		$inputs = Input::all();
		$reglas = array(
			'first_name' => 'required|min:4', 
			'last_name' => 'required',
			'email' => 'email|unique:users,email',
			'username' => 'required|unique:users,username',
			'password' => 'required|min:5|max:20',
			'confirmar_clave' => 'same:password',
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
			$clave = Input::get('password');
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->username = Input::get('username');
			$user->password = Hash::make($clave);
			$user->tipo_usuario = Input::get('tipo_usuario');
			
	        $user->save();
			return Redirect::to('lista_usuarios')->with('error', 'El usuario ha sido registrado con Éxito')->withInput();
		}
	}
	public function destroy($id)
	{	
	$user = User::find($id);	        
	        if (is_null ($user))
	        {
	            App::abort(404);
	        }
	        $user->delete();
	        $users = User::all();
	        return View::make('lista_usuarios')->with('users', $users);
	}

	public function all_users() {
		$users = User::all();
		return View::make('lista_usuarios')->with('users', $users);
		
	}
	public function getEditUsuario($id) {
		$user = User::find($id);
		if (is_null ($user))
		{
		App::abort(404);
		}
		return View::make('edit_user')->with('user',$user);
	}
	public function update() {
		$id_user = Input::get('id');
		$user = User::find($id_user);

		$clave = Input::get('password');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');
		$user->username = Input::get('username');
		$user->password = Hash::make($clave);
		$user->tipo_usuario = Input::get('tipo_usuario');
		$user->save();

		$users = User::all();
		return View::make('lista_usuarios')->with('users', $users);

		//$data = Input::get('id');
		/*$user = User::find(1);
		$user->first_name = Input::get('first_name');
		$user->save();*/
		/*if (is_null ($user))
        {
            App::abort(404);
        }
        $data = Input::all();

            // Si la data es valida se la asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return View::make('lista_usuarios')->with('users', $users);
 
            // En caso de error regresa a la acción edit con los datos y los errores encontrados*/
	}
	
}


/*public function getEditTabAlumno($id) {
			if (!SessionUtil::isLoggedIn()) {
				return Redirect::to('login');
			}
			
			$idalumno = $id;
			$apellido = null;

			$turnos = Turno::all();
			$tdocs = Tdoc::all();
			$estadosdoc = EstadoDoc::all();
			$condiciones = CondicionInscrip::all();
			$niveles = NivelEscuela::all();
			$localidades = Localidad::all();
			$nacionalidades = Pais::all();
			$escuelas = Escuela::all();
			$provincias = Provincia::all();
			$parentescos = Parentesco::all();
			$condiciones_actividad = CondicionActividad::all();
			$niveles_instruccion = NivelInstruccion::all();
			$especialidades = Especialidad::all();
			$ciclos = Ciclo::all();

			$result_edit_alumnos = Alumno::SP_VIEW_EDIT_ALUMNOS($idalumno,$apellido);


			return View::make('user.inscripcion')->with('tab', 'alumno')
												->with('turnos',$turnos)
												 ->with('tdocs',$tdocs)
												 ->with('estadosdoc',$estadosdoc)
												 ->with('condiciones',$condiciones)
												 ->with('niveles',$niveles)
												 ->with('localidades',$localidades)
												 ->with('nacionalidades',$nacionalidades)
												 ->with('escuelas',$escuelas)
												 ->with('provincias',$provincias)
												 ->with('parentescos',$parentescos)
												 ->with('condiciones_actividad',$condiciones_actividad)
												 ->with('niveles_instruccion',$niveles_instruccion)
												 ->with('especialidades',$especialidades)
												 ->with('ciclos',$ciclos)
												 ->with('result_edit_alumnos', $result_edit_alumnos);
			//return "Estas queriendo editar un alumno: ".$id;
		}*/