<?php

class MasterKaryawanController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $success = Session::get('mk01_success');
        $data = array(
            "karyawans" => KaryawanModel::all(),
            "mk01_success" => $success
        );
        return View::make('master.m_list_karyawan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $success = Session::get('mk01_success');
        $KaryawanModel = new KaryawanModel();
        $JabatanModel = new JabatanModel();
        $JamKerjaModel = new JamKerjaModel();
        $GajiModel = new GajiModel();
        $data = array(
            "karyawan" => $KaryawanModel::find(0),
            "karyawans" => KaryawanModel::all(),
            "action" => action("MasterKaryawanController@store"),
            "jabatans" => $JabatanModel->getJabatanAktif(),
            "jamkerjas" => $JamKerjaModel->getJamKerjaAktif(),
            "jamistirahats" => $JamKerjaModel->getJamIstirahatAktif(),
            "gajis" => $GajiModel->getJenisGajiAktif(),
            "mk01_status" => $success
        );
        return View::make('master.m_karyawan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
//         1. setting validasi
        $messages = array(
            'required' => 'Inputan <b>Tidak Boleh Kosong</b>!',
            'numeric' => 'Inputan <b>Harus Angka</b>!',
            'same'    => 'Password <b>Tidak Sama</b>!'
        );

        $validator = Validator::make(
                        Input::all(), array(
                    "nama" => "required",
                    "usernm" => "required",
                    "passwd" => "required",
                    "passwd2" => "same:passwd",
                    "norek1" => "required|numeric",
                    "norek2" => "required|numeric",
                    "ttl" => "required",
                    "tglaktif" => "required",
                    "addr1" => "required",
                    "notelp" => "required|numeric",
                    "foto" => "required"
            ), $messages
        );

        // 2a. jika semua validasi terpenuhi simpan ke database
        if ($validator->passes()) {
            $img = Input::File('foto');
            if (Input::File('foto')->isValid()) {
                $destinationPath = 'uploads';
                $filename = rand(10000, 99999)."_".$img->getClientOriginalName();
//                $fullname = rand(10000, 99999) . '_' . $filename . '.' . $img->getClientOriginalExtension();
                $img->move($destinationPath, $filename);

                $karyawan = new KaryawanModel();
                $karyawan->nama = Input::get('nama');
                $karyawan->usernm = Input::get('usernm');
                $karyawan->email = Input::get('email');
                $karyawan->passwd = Input::get('passwd');
                $karyawan->gndr = Input::get('gndr');
                $karyawan->norek1 = Input::get('norek1');
                $karyawan->norek2 = Input::get('norek2');
                $karyawan->tglaktif = strftime("%Y-%m-%d", strtotime(Input::get('tglaktif')));
                $karyawan->ttl = strftime("%Y-%m-%d", strtotime(Input::get('ttl')));
                $karyawan->addr1 = Input::get('addr1');
                $karyawan->notelp = Input::get('notelp');
                $karyawan->status = "Y";
                $karyawan->pic = $filename;
                $karyawan->tbsld = 0;
                $karyawan->htsld = 0;
                $karyawan->idjb = Input::get('idjb');
                $karyawan->save();
                
                Session::flash('mk01_success', 'Data Telah Ditambahkan!');
                return Redirect::to('karyawan');
            } else {
                Session::flash('mk01_failed', 'Foto tidak valid!');
                return Redirect::to('karyawan/create');
            }
        }
        // 2b. jika tidak, kembali ke halaman form registrasi
        else {
            return Redirect::to('karyawan/create')
                            ->withErrors($validator)
                            ->withInput();
        }
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
        $success = Session::get('mk01_success');
        $KaryawanModel = new KaryawanModel();
        $JabatanModel = new JabatanModel();
        $JamKerjaModel = new JamKerjaModel();
        $GajiModel = new GajiModel();
        $data = array(
            "karyawan" => $KaryawanModel::find($id),
            "action" => action("MasterKaryawanController@update", $id),
            "jabatans" => $JabatanModel->getJabatanAktif(),
            "jamkerjas" => $JamKerjaModel->getJamKerjaAktif(),
            "jamistirahats" => $JamKerjaModel->getJamIstirahatAktif(),
            "gajis" => $GajiModel->getJenisGajiAktif(),
            "mk01_status" => $success
        );
        return View::make('master.m_karyawan', $data);
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
