<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// Master Jam Kerja
Route::get('jamkerja', 'MasterJamKerjaController@index');
Route::post('jamkerja/create', 'MasterJamKerjaController@create');
Route::get('jamkerja/edit/{id}', 'MasterJamKerjaController@edit');
Route::post('jamkerja/update/{id}', 'MasterJamKerjaController@update');
Route::get('jamkerja/delete/{id}', 'MasterJamKerjaController@destroy');

// Master Jabatan
Route::get('jabatan', 'MasterJabatanController@index');
Route::post('jabatan/create', 'MasterJabatanController@create');
Route::get('jabatan/edit/{id}', 'MasterJabatanController@edit');
Route::post('jabatan/update/{id}', 'MasterJabatanController@update');
Route::get('jabatan/delete/{id}', 'MasterJabatanController@destroy');

// Master Gaji
Route::get('jenisgaji', 'MasterGajiController@index');
Route::post('jenisgaji/create', 'MasterGajiController@create');
Route::get('jenisgaji/edit/{id}', 'MasterGajiController@edit');
Route::post('jenisgaji/update/{id}', 'MasterGajiController@update');
Route::get('jenisgaji/delete/{id}', 'MasterGajiController@destroy');

// Master Karyawan
Route::get('karyawan', 'MasterKaryawanController@index');
Route::get('karyawan/create', 'MasterKaryawanController@create');
Route::post('karyawan/store', 'MasterKaryawanController@store');
Route::get('karyawan/edit/{id}', 'MasterKaryawanController@edit');
Route::post('karyawan/update/{id}', 'MasterKaryawanController@update');
Route::get('karyawan/delete/{id}', 'MasterKaryawanController@destroy');

Route::get('myindografika', function()
{
	return View::make('master.my_indografika');
});

//Fitur
Route::get('myindografika/gajikaryawan', function()
{
	return View::make('master.my_gaji');
});

Route::get('myindografika/tabungankaryawan', function()
{
	return View::make('master.my_tabungan');
});

Route::get('myindografika/pinjamankaryawan', function()
{
	return View::make('master.my_pinjaman');
});

// end fitur

Route::get('inputdata/hutang', function()
{
	return View::make('master.trans_hutang');
});

Route::get('inputdata/tabungan', function()
{
	return View::make('master.trans_tabungan');
});

Route::get('inputdata/gaji', function()
{
	return View::make('master.trans_gaji');
});

// Input data
// End Input data

Route::get('daftarmasuk', function()
{
	return View::make('daftar.masuk');
});

Route::get('daftarpulang', function()
{
	return View::make('daftar.pulang');
});

Route::get('daftarlembur', function()
{
	return View::make('daftar.lembur');
});
