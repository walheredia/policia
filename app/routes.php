<?php

/*Llamadas al controlador Auth*/
Route::get('login', 'AuthController@showLogin'); // Mostrar login
Route::post('login', 'AuthController@postLogin'); // Verificar datos
Route::get('logout', 'AuthController@logOut'); // Finalizar sesión


Route::get('/', 'HomeController@showWelcome'); // Vista de inicio

//Usuarios
Route::get('register', 'UsuariosController@get_nuevo');
Route::post('register', 'UsuariosController@post_nuevo');

Route::get('edit_user{id}', 'UsuariosController@getEditUsuario')->where('id', '[0-9]+');
Route::post('edit_user', 'UsuariosController@update');

Route::get('lista_usuarios{id}', 'UsuariosController@destroy');
Route::get('lista_usuarios', 'UsuariosController@all_users');

//Moviles
Route::get('register_movil', 'MovilesController@get_nuevo');
Route::post('register_movil', 'MovilesController@post_nuevo');
Route::get('lista_moviles', 'MovilesController@all_moviles');
Route::get('lista_moviles{id}', 'MovilesController@destroy');
Route::post('edit_movil', 'MovilesController@update');

//Equipos AVL
Route::get('register_avl', 'EquiposAVLController@get_nuevo');
Route::post('register_avl', 'EquiposAVLController@post_nuevo');
Route::get('lista_avls', 'EquiposAVLController@all_avls');

//Dependencias
Route::get('register_dependencia', 'DependenciasController@get_nuevo');
Route::post('register_dependencia', 'DependenciasController@post_nuevo');
Route::get('lista_dependencias', 'DependenciasController@all_dependencias');
Route::get('lista_dependencias{id}', 'DependenciasController@destroy');
Route::get('edit_dependencia{id}', 'DependenciasController@getEditDependencia')->where('id', '[0-9]+');
Route::post('edit_dependencia', 'DependenciasController@update');

//Eqipos Radio
Route::get('register_radio', 'EquiposRadioController@get_nuevo');
Route::post('register_radio', 'EquiposRadioController@post_nuevo');
Route::get('lista_radios', 'EquiposRadioController@all_radios');

Route::get('register_movil_dependencia', 'MovilDependenciaController@get_nuevo');
Route::post('register_movil_dependencia', 'MovilDependenciaController@post_nuevo');
Route::get('edit_movil{id}', 'MovilesController@getEditMovil')->where('id', '[0-9]+');

/*Rutas privadas solo para usuarios autenticados*/
Route::group(['before' => 'auth'], function()
{
    
});

App::missing(function($exception) {
    return "Exception";

});





/*Route::get('/', 'HomeController@showWelcome');

// Rutas de /usuario
Route::get('usuario', 'UserController@getIndex');

//Pestañas de inscripcion
Route::get('inscripcion','AlumnController@getIndex');
Route::get('inscripcion/alumno', 'AlumnController@getTabAlumno');
Route::get('inscripcion/familiares', 'AlumnController@getTabFamiliares');
Route::get('inscripcion/salud', 'AlumnController@getTabSalud');
Route::get('inscripcion/sae', 'AlumnController@getTabSae');

Route::get('inscripcion/alumno/{id}', 'AlumnController@getEditTabAlumno')->where('id', '[0-9]+');
Route::get('inscripcion/familiares/{id}', 'AlumnController@getEditTabFamiliares')->where('id', '[0-9]+');
Route::get('inscripcion/salud/{id}', 'AlumnController@getEditTabSalud')->where('id', '[0-9]+');
Route::get('inscripcion/sae/{id}', 'AlumnController@getEditTabSae')->where('id', '[0-9]+');

//Ruta de validaciones
Route::get('validaciones', 'AlumnController@validaciones');
Route::get('inscripcion/alumno/validaciones', 'AlumnController@validaciones');
Route::get('inscripcion/familiares/validaciones', 'AlumnController@validaciones');
Route::get('inscripcion/salud/validaciones', 'AlumnController@validaciones');

//Ruta de alta de alumno 
Route::post('inscripcion/alumno', 'AlumnController@alta_alumno');

//Ruta de alta Familiares/tutores
Route::post('inscripcion/familiares', 'AlumnController@alta_familiar');

//Ruta de alta salud
Route::post('inscripcion/salud', 'AlumnController@alta_salud');

//Ruta de inscripcion
Route::get('login' , 'UserController@getLogin');
Route::post('login' , 'UserController@postLogin');
Route::get('logout','UserController@logout');

*/