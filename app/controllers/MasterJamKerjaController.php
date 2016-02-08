<?php

class MasterJamKerjaController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $JamKerjaModel = new JamKerjaModel();
        $jam_kerja = JamKerjaModel::all();
        $success = Session::get('mj02_success');
        $data = array(
            "jam_kerja" => $JamKerjaModel->find(0),
            "jam_kerjas" => $jam_kerja,
            "action" => action("MasterJamKerjaController@create"),
            "mj02_success" => $success
        );
        return View::make('master.m_jam_kerja', $data);
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
                    "jmmsk" => "required",
                    "jmklr" => "required"), $messages
        );

        // 2a. jika semua validasi terpenuhi simpan ke database
        if ($validator->passes()) {
            $jam_kerja = new JamKerjaModel();
            $jam_kerja->tipe = Input::get('tipe');
            $jam_kerja->jmmsk = Input::get('jmmsk');
            $jam_kerja->jmklr = Input::get('jmklr');
            $jam_kerja->status = Input::get('status') == "Y" ? "Y" : "N";
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
        $JamKerjaModel = new JamKerjaModel();
        $jam_kerja = $JamKerjaModel->find($id);
        $data = array(
            "jam_kerja" => $jam_kerja,
            "action" => action("MasterJamKerjaController@update", $id),
            "jam_kerjas" => JamKerjaModel::all()
        );
        return View::make('master.m_jam_kerja', $data);
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
                    "jmmsk" => "required",
                    "jmklr" => "required"), $messages
        );

        // 2a. no error validaion
        if ($validator->passes()) {
            $JamKerjaModel = new JamKerjaModel();
            $jam_kerja = $JamKerjaModel->find($id);
            $jam_kerja->tipe = Input::get('tipe');
            $jam_kerja->jmmsk = Input::get('jmmsk');
            $jam_kerja->jmklr = Input::get('jmklr');
            $jam_kerja->status = Input::get('status') == "Y" ? "Y" : "N";
            $jam_kerja->save();
            Session::flash('mj02_success', 'Data Telah Di-ubah!');
            return Redirect::to('jamkerja');
        }
        // 2b. error validation
        else {
            return Redirect::to('jamkerja/edit/' . $id)
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
        $jam_kerja = JamKerjaModel::find($id);
        $jam_kerja->delete();
        Session::flash('mj02_success', 'Data Telah Di-hapus!');
        return Redirect::to('jamkerja');
    }

}
