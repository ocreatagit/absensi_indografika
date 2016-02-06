<?php

class MasterJabatanController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $jabatan = JabatanModel::all();
        $success = Session::get('mj01_success');
        return View::make('master.m_jabatan')->with('jabatans', $jabatan)->with('mj01_success', $success);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // 1. setting validasi
        $messages = array(
            'required' => 'Inputan Tidak Boleh Kosong!'
        );

        $validator = Validator::make(
                        Input::all(), array(
                    "jmmsk" => "required",
                    "jmklr" => "required"), $messages
        );

        // 2a. jika semua validasi terpenuhi simpan ke database
        if ($validator->passes()) {
            $jam_kerja = new JamKerjaModel();
            $jam_kerja->tipe = Input::get('tipe');
            $jam_kerja->jmmsk = Input::get('jmmsk');
            $jam_kerja->jmklr = Input::get('jmklr');
            $jam_kerja->save();
            Session::flash('mj02_success', 'Data Telah Ditambahkan!');
            return Redirect::to('jamkerja');
        }
        // 2b. jika tidak, kembali ke halaman form registrasi
        else {
            return Redirect::to('jamkerja')
                            ->withErrors($validator)
                            ->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
