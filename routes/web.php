<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//vistas
Route::view('usuarios','usuarios');
Route::view('medicamentos','medicamentos');
Route::view('equipo','Equipo');
Route::view('medicos','medicos');
Route::view('inicio','login');
Route::view('registro','registro');


//apis
Route::apiResource('apiusu','ApiUsuariosController');
Route::apiResource('apimedico','ApiMedicosController');
Route::apiResource('apiequipo','ApiEquipoController');
Route::apiResource('apimedi','ApiMedicamentosController');
//VALIDACION
Route::post('entrada','AccesoController@validar');
Route::get('salir','AccesoController@salir');