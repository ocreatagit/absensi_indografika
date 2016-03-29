<?php

class TransaksiOmzetController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $success = Session::get('tz01_success');
        $tz01 = new tz01();
        $data = array(
            "omzets" => $tz01->getOmzet(),
            "tz01_success" => $success
        );
        return View::make('transaksi.trans_omzet', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $success = Session::get('tz01_success');
        $data = array(
            "karyawanalls" => mk01::all(),
            "tz01_success" => $success
        );
        return View::make('transaksi.trans_omzet_karyawan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $tz01 = new tz01();
        $tz01->tglomz = strftime("%Y-%m-%d", strtotime(Input::get("tglomz")));
        $tz01->nilomz = Input::get("nilomz");
        $tz01->idkar = Input::get("idkar");
        $tz01->save();
        
        Session::flash('tz01_success', 'Data Telah DiTambahkan!');
        return Redirect::to('inputdata/omzet');
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
        $tz01 = tz01::find($id);
        $tz01->delete();
        
        Session::flash('tz01_success', 'Data Telah DiHapus!');
        return Redirect::to('inputdata/omzet');
    }

}
