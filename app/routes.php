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
    return Redirect::to('login');
});

//login
Route::get('login','loginController@index');
Route::post('login','loginController@login');
Route::get('logout','loginController@logout');

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
Route::get('master/karyawan/get_karyawan/{id}', 'MasterKaryawanController@getKaryawan');
Route::post('master/karyawan/save_referral_karyawan', 'MasterKaryawanController@saveReferral');
Route::get('master/karyawan/delete_referral_karyawan/{id}/{idkar}', 'MasterKaryawanController@deleteReferral');

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

// Input data
// Transaksi Hutang
Route::get('inputdata/hutang', "TransaksiHutangController@index");
Route::post('inputdata/hutang/store', "TransaksiHutangController@store");
Route::get('inputdata/hutang/delete/{id}', "TransaksiHutangController@destroy");

// Transaksi Tabungan
Route::get('inputdata/tabungan', "TransaksiTabunganController@index");
Route::post('inputdata/tabungan/store', "TransaksiTabunganController@store");
Route::get('inputdata/tabungan/delete/{id}', "TransaksiTabunganController@destroy");

// Transaksi Gaji
Route::get('inputdata/gaji',  "TransaksiGajiController@index");
Route::get('inputdata/show_gaji_karyawan',  "TransaksiGajiController@show");
Route::get('inputdata/trans_gaji_karyawan/{id}',  "TransaksiGajiController@create");
Route::get('inputdata/gaji_karyawan_detail/{id}',  "TransaksiGajiController@detail");
Route::post('inputdata/save_trans_gaji_karyawan',  "TransaksiGajiController@store");

Route::get('inputdata/transfer',  "TransaksiTransferController@index");
Route::get('inputdata/detail/{id}',  "TransaksiTransferController@show");
Route::post('inputdata/simpan_gaji_bonus',  "TransaksiTransferController@savebonus");
Route::get('inputdata/bayar_gaji/{id}',  "TransaksiTransferController@payment");

Route::get('inputdata/omzet',  "TransaksiOmzetController@index");
Route::get('inputdata/omzet_karyawan',  "TransaksiOmzetController@create");
Route::post('inputdata/save_omzet_karyawan',  "TransaksiOmzetController@store");
Route::get('inputdata/delete/{id}',  "TransaksiOmzetController@destroy");

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
Route::get('usermatrix/{id}', 'MasterKaryawanController@usermatrix' );
Route::post('usermatrix/{id}', 'MasterKaryawanController@usermatrixsave' );
