<?php

class MasterJabatanController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $JabatanModel = new JabatanModel();
        $jabatan = JabatanModel::all();
        $success = Session::get('mj01_success');
        $data = array(
            "jabatan" => $JabatanModel->find(0),
            "jabatans" => $jabatan,
            "action" => action("MasterJabatanController@create"),
            "mj01_success" => $success
        );
        return View::make('master.m_jabatan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // 1. setting validasi
        $messages = array(
            'required' => 'Inputan <b>Tidak Boleh Kosong</b>!'
        );

        $validator = Validator::make(
                        Input::all(), array(
                    "nama" => "required"), $messages
        );

        // 2a. jika semua validasi terpenuhi simpan ke database
        if ($validator->passes()) {
            $jabatan = new JabatanModel();
            $jabatan->flgomzt = Input::get('flgomzt') == "Y" ? "Y" : "N";
            $jabatan->nama = Input::get('nama');
            $jabatan->status = Input::get('status') == "Y" ? "Y" : "N";
            $jabatan->save();
            Session::flash('mj01_success', 'Data Telah Ditambahkan!');
            return Redirect::to('jabatan');
        }
        // 2b. jika tidak, kembali ke halaman form registrasi
        else {
            return Redirect::to('jabatan')
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
        $jabatanModel = new JabatanModel();
        $jabatan = $jabatanModel->find($id);
        $data = array(
            "jabatan" => $jabatan,
            "action" => action("MasterJabatanController@update", $id),
            "jabatans" => JabatanModel::all()
        );
        return View::make('master.m_jabatan', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        // 1. setup validation
        $messages = array(
            'required' => 'Inputan <b>Tidak Boleh Kosong</b>!'
        );

        $validator = Validator::make(
                        Input::all(), array(
                    "nama" => "required"), $messages
        );
        
        // 2a. jika semua validasi terpenuhi simpan ke database
        if ($validator->passes()) {
            $jabatanModel = new JabatanModel();
            $jabatan = $jabatanModel->find($id);
            $jabatan->flgomzt = Input::get('flgomzt') == "Y" ? "Y" : "N";
            $jabatan->nama = Input::get('nama');
            $jabatan->status = Input::get('status') == "Y" ? "Y" : "N";
            $jabatan->save();
            Session::flash('mj01_success', 'Data Telah Ditambahkan!');
            return Redirect::to('jabatan');
        }
        // 2b. jika tidak, kembali ke halaman form registrasi
        else {
            return Redirect::to('jabatan')
                            ->withErrors($validator)
                            ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $jabatan = JabatanModel::find($id);
        $jabatan->delete();
        Session::flash('mj01_success', 'Data Telah Di-hapus!');
        return Redirect::to('jabatan');
    }

}
