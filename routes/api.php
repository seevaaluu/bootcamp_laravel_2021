<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/hola_mundo', function() {
    return 'Hola mundo API';
})->name('hola_mundo');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth'], function () {
    // Routes libros
    Route::get('/libros', 'ApiLibrosController@index')->name('api.libros.index');
    Route::get('/libros/create', 'ApiLibrosController@create')->name('api.libros.create');
    Route::post('/libros', 'ApiLibrosController@store')->name('api.libros.store');
    Route::get('/libros/{id}/edit', 'ApiLibrosController@edit')->name('api.libros.edit');
    Route::get('/libros/{id}', 'ApiLibrosController@show')->name('api.libros.show');
    Route::patch('/libros/{id}', 'ApiLibrosController@update')->name('api.libros.update');
    Route::delete('/libros/{id}', 'ApiLibrosController@destroy')->name('api.libros.destroy');

});

// Routes Authentiation
Route::post('/auth/login', 'Auth\LoginController@api_login');