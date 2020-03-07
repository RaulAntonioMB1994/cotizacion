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

use App\Http\Controllers\Detalle_cotizacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cotizacion/create', 'CotizacionController@create')->name('cotizacion.create');

Route::post('cotizacion','CotizacionController@store')->name('cotizacion.store');

Route::get('cotizacion/detalle_cotizacion/index','Detalle_cotizacionController@index')->name('detalle_cotizacion.index');

Route::get('cotizacion/detalle_cotizacion/create', 'Detalle_cotizacionController@create')->name('detalle_cotizacion.create');

Route::post('cotizacion/detalle_cotizacion/store', 'Detalle_cotizacionController@store')->name('detalle_cotizacion.store');

Route::get('cotizacion/detalle_cotizacion/{id}/destroy',[ 'uses' => 'Detalle_cotizacionController@destroy','as' => 'detalle_cotizacion.destroy']);

Route::post('cotizacion/update', 'CotizacionController@update')->name('cotizacion.update');
