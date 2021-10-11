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
