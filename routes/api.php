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

Route::post('api/mahasiswa/{mahasiswa}/editnilai', 'ApiController@editnilai')->name('mahasiswa.editnilai');
// Route::get('api/mahasiswa', 'MahasiswaController@index')->name('mahasiswa');
