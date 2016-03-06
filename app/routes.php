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

Route::get('/', function() {
    return View::make('hello');
});

// Master Jam Kerja
Route::get('master/jamkerja', 'MasterJamKerjaController@index');
Route::post('master/jamkerja/create', 'MasterJamKerjaController@create');
Route::get('master/jamkerja/edit/{id}', 'MasterJamKerjaController@edit');
Route::post('master/jamkerja/update/{id}', 'MasterJamKerjaController@update');
Route::get('master/jamkerja/delete/{id}', 'MasterJamKerjaController@destroy');

// Master Jabatan
Route::get('master/jabatan', 'MasterJabatanController@index');
Route::post('master/jabatan/create', 'MasterJabatanController@create');
Route::get('master/jabatan/edit/{id}', 'MasterJabatanController@edit');
Route::post('master/jabatan/update/{id}', 'MasterJabatanController@update');
Route::get('master/jabatan/delete/{id}', 'MasterJabatanController@destroy');

// Master Gaji
Route::get('master/jenisgaji', 'MasterGajiController@index');
Route::post('master/jenisgaji/create', 'MasterGajiController@create');
Route::get('master/jenisgaji/edit/{id}', 'MasterGajiController@edit');
Route::post('master/jenisgaji/update/{id}', 'MasterGajiController@update');
Route::get('master/jenisgaji/delete/{id}', 'MasterGajiController@destroy');

// Master Karyawan
Route::get('master/karyawan', 'MasterKaryawanController@index');
Route::get('master/karyawan/create', 'MasterKaryawanController@create');
Route::post('master/karyawan/store', 'MasterKaryawanController@store');
Route::get('master/karyawan/edit/{id}', 'MasterKaryawanController@edit');
Route::post('master/karyawan/update/{id}', 'MasterKaryawanController@update');
Route::get('master/karyawan/delete/{id}', 'MasterKaryawanController@destroy');
Route::get('master/karyawan/change_status/{id}', 'MasterKaryawanController@changeStatus');
Route::get('master/karyawan/add_gaji/{id}', 'MasterKaryawanController@addGaji');
Route::post('master/karyawan/insert_item_gaji/{id}', 'MasterKaryawanController@saveItemGaji');
Route::get('master/karyawan/delete_item_gaji/{rowid}/{id}', 'MasterKaryawanController@deleteItemGaji');
Route::get('master/karyawan/save_gaji', 'MasterKaryawanController@saveGaji');
Route::post('master/karyawan/save_karyawan_gaji', 'MasterKaryawanController@saveKaryawanGaji');
Route::get('master/karyawan/delete_karyawan_gaji/{id}', 'MasterKaryawanController@deleteKaryawanGaji');

Route::get('myindografika', function() {
    return View::make('master.my_indografika');
});

//Fitur
Route::get('myindografika/gajikaryawan', function() {
    return View::make('master.my_gaji');
});

Route::get('myindografika/tabungankaryawan', function() {
    return View::make('master.my_tabungan');
});

Route::get('myindografika/pinjamankaryawan', function() {
    return View::make('master.my_pinjaman');
});

// end fitur
// Transaksi Hutang
Route::get('inputdata/hutang', "TransaksiHutangController@index");

Route::get('inputdata/tabungan', function() {
    return View::make('transaksi.trans_tabungan');
});

Route::get('inputdata/gaji', function() {
    return View::make('transaksi.trans_gaji');
});

// Input data
// End Input data

Route::get('daftarmasuk', function() {
    date_default_timezone_set('Asia/Jakarta');
    return View::make('daftar.masuk');
});
Route::get('getTimeServer', 'DaftarController@getTimeServer');
Route::get('getDateServer', 'DaftarController@getDateServer');
Route::get('getDaftarMasuk', 'DaftarController@getDaftarMasuk');

Route::get('daftarpulang', function() {
    date_default_timezone_set('Asia/Jakarta');
    return View::make('daftar.pulang');
});
Route::get('getDaftarPulang', 'DaftarController@getDaftarPulang');

Route::get('daftarlembur', function() {
    date_default_timezone_set('Asia/Jakarta');
    return View::make('daftar.lembur');
});


Route::get('absen', function() {
    return View::make('absen');
});

Route::get('getAbsen', 'HomeController@getAbsen');
