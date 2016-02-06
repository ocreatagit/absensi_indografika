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

// Master Jabatan
Route::get('jabatan', 'MasterJabatanController@index');
Route::post('simpan', 'MasterJabatanController@save');

Route::get('jenisgaji', function()
{
	return View::make('master.m_jenis_gaji');
});

Route::get('karyawan', function()
{
	return View::make('master.m_karyawan');
});

Route::get('myindografika', function()
{
	return View::make('master.my_indografika');
});

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
