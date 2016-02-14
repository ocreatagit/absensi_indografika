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
            "mk01_status" =>  $success
        );
        return View::make('master.m_list_karyawan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $success = Session::get('mj02_success');
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
            "mk01_status" =>  $success
        );
        return View::make('master.m_karyawan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
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
