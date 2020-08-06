<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('mahasiswa', 'MahasiswaController@index');

Route::post('mahasiswa', 'MahasiswaController@create');

Route::put('/mahasiswa/{$nim}', 'MahasiswaController@update');

Route::delete('/mahasiswa/{$nim}', 'MahasiswaController@delete');


Route::get('produk', 'ProdukController@index')->middleware('jwt.verify');;

Route::post('produk', 'ProdukController@create');

Route::put('produk/{id}', 'ProdukController@update');

Route::delete('produk/{id}', 'ProdukController@delete');


Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

// Route::get('produkall', 'ProdukController@produkAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
