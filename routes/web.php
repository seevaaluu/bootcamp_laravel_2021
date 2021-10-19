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

Route::get('/hola_mundo', function() {
    return 'Hola mundo web';
})->name('hola_mundo');

// Routes libros
Route::get('/libros', 'LibrosController@index')->name('libros.index');
Route::get('/libros/create', 'LibrosController@create')->name('libros.create');
Route::post('/libros', 'LibrosController@store')->name('libros.store');
Route::get('/libros/{id}/edit', 'LibrosController@edit')->name('libros.edit');
Route::patch('/libros/{id}', 'LibrosController@update')->name('libros.update');

/*Route::resource('/libros', 'LibrosController')->only([
    'index', 'show'
]);*/