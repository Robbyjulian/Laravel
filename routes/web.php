<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('index');
// });
// Route::post('/', 'otentikasi\OtentikasiController@login')->name('login');
// Route::get('/', 'otentikasi\OtentikasiController@index')->name('login');
Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');


// Route::group(['middleware' => 'CekLoginMiddleware'], function () {
Route::group(['middleware' => 'auth'], function () { // Route::group(['middleware' => 'CekLoginMiddleware'], function () {
    Route::group(['middleware' => 'auth'], function () {

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('mahasiswa', 'MahasiswaController@index')->name('mahasiswa');
        Route::get('mahasiswa/create', 'MahasiswaController@create')->name('mahasiswa.tambah');
        Route::post('mahasiswa/store', 'MahasiswaController@store')->name('mahasiswa.simpan');
        Route::delete('mahasiswa/destroy/{mahasiswa}', 'MahasiswaController@destroy')->name('mahasiswa.hapus');
        Route::get('mahasiswa/{mahasiswa}/edit', 'MahasiswaController@edit')->name('mahasiswa.edit');
        Route::patch('mahasiswa/{mahasiswa}', 'MahasiswaController@update')->name('mahasiswa.update');
        Route::get('mahasiswa/{mahasiswa}/profile', 'MahasiswaController@profile')->name('mahasiswa.profile');
        Route::post('mahasiswa/{mahasiswa}/addnilai', 'MahasiswaController@addnilai')->name('mahasiswa.addnilai');
        Route::get('mahasiswa/{mahasiswa}/{idmakul}/deletenilai', 'MahasiswaController@deletenilai')->name('mahasiswa.deletenilai');
        Route::get('mahasiswa/exportexcel', 'MahasiswaController@exportExcel')->name('mahasiswa.export');
        Route::get('mahasiswa/exportpdf', 'MahasiswaController@exportPdf')->name('mahasiswa.pdf');
        Route::post('mahasiswa/importexcel', 'MahasiswaController@importexcel')->name('mahasiswa.import');

        Route::get('dosen/{id}/profile', 'DosenController@profile')->name('dosen.profile');
        Route::resource('dosen', 'DosenController');

        Route::resource('makul', 'MakulController');

        Route::get('setup', 'konfigurasi\SetupController@index')->name('setup');
        Route::get('setup/create', 'konfigurasi\SetupController@create')->name('setup.tambah');
        Route::post('setup/store', 'konfigurasi\SetupController@store')->name('setup.simpan');;
        Route::get('setup/{setup}/edit', 'konfigurasi\SetupController@edit')->name('setup.edit');
        Route::patch('setup/{setup}', 'konfigurasi\SetupController@update')->name('setup.update');

        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
