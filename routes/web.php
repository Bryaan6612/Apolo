<?php

use App\Http\Controllers\Cliente_dos;
use App\Http\Controllers\clientes_controller;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\Venta_controller;
use App\Http\Controllers\Detalle_venta_controller;
use App\Http\Controllers\area_controller;
use App\Http\Controllers\eje_controller;
use App\Http\Controllers\edificio_controller;
use App\Http\Controllers\usuarios_controller;
use Illuminate\Support\Facades\Route;

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







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/prueba', function() {return 'hola';})->middleware('perfil');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	 Route::get('cliente/alta', [Cliente_dos::class,'index'])->name('cliente.index');
	
	 Route::get('@/ver_imagen/{id}',[ReportesController::class, 'ver_imagen'])->name('ver_imagen');

	 Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware('auth');

	 Route::get('/admin',function() {return view('pages.admin');})->name('admin.index')->middleware('canAccess');
	
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\P
	rofileController@password']);

	Route::get('clientes',[clientes_controller::class, 'vista'])->name('m_clientes')->middleware('canAccess');

	Route::get('api/clientes/lista', [clientes_controller::class, 'listar']);

	Route::resource('reportes',ReportesController::class);
	
	Route::resource('reportes',ReportesController::class);


	Route::post('api/clientes/guardar',[clientes_controller::class,'guardar']);

	Route::post('api/clientes/eliminar',[clientes_controller::class,'eliminar']);

	Route::get('reportes',[ReportesController::class, 'vista'])->name('m_reportes');

	Route::get('api/reportes/lista', [ReportesController::class, 'listar']);


	Route::post('api/reportes/guardar',[ReportesController::class,'guardar']);   

	Route::post('api/reportes/eliminar',[ReportesController::class,'eliminar']);

	Route::get('api/reportes', [ReportesController::class, 'listar'])->name("reportes.listar");

	Route::post('api/reportes', [ReportesController::class, 'listar'])->name("reportes.listar");


	Route::get('venta',[venta_controller::class, 'vista'])->name('m_venta');

	Route::get('api/ventas/lista', [venta_controller::class, 'listar']);

	Route::post('api/ventas/guardar',[venta_controller::class,'guardar']);

	Route::post('api/ventas/eliminar',[venta_controller::class,'eliminar']);

	Route::post('api/ventas/cerrar',[venta_controller::class,'cerrar']);

	Route::post('api/ventas/completa',[venta_controller::class,'completar']);

	Route::get('detalleventa',[Detalle_venta_controller::class, 'vista'])->name('m_detalleventa');

	Route::get('api/detalleventa/lista', [Detalle_venta_controller::class, 'listar']);

	Route::post('api/detalleventa/guardar',[Detalle_venta_controller::class,'guardar']);

	Route::post('api/detalleventa/eliminar',[Detalle_venta_controller::class,'eliminar']);

	Route::get('api/areas/lista', [area_controller::class, 'listar']);
	Route::get('areas',[area_controller::class, 'vista'])->name('m_areas');
	Route::get('api/eje/lista', [eje_controller::class, 'listar']);
	Route::get('eje',[eje_controller::class, 'vista'])->name('m_ejes');
	Route::get('api/edificios/lista', [edificio_controller::class, 'listar']);
	Route::get('edificios',[edificio_controller::class, 'vista'])->name('m_edificios');
	
	Route::get('api/usuarios/lista', [usuarios_controller::class, 'listar']);
	Route::get('usuarios',[usuarios_controller::class, 'vista'])->name('m_usuarios');

});

Route::get('cookie/crear/{valor}', function ($valor){
	Cookie::queue('mi_cookie', $valor, 120);
	return "Ok";
});

Route::get('cookie/leer', function (){
	$val = Cookie::get('mi_cookie');
	return $val;
});

Route::get('cookie/borrar', function (){
	$cookie = Cookie::forget('mi_cookie');

	Cookie::queue($cookie);
	return "Ok";
});

Route::get('session/crear/{valor}', function($valor){
	session()->put('session', $valor);
	return "Se agrego correctamente la session agregado";
});
Route::get('session/leer', function(){
	$val=session()->get('session');
	return $val;
});
Route::get('session/borrar', function(){
	$val=session()->forget('session');
	session()->put('session');
	return "Se borro correctamente";
});
