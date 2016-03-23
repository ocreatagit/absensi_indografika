<?php

class TransaksiGajiController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $success = Session::get('tg01_success');
        $danger = Session::get('tg01_danger');
        $data = array(
            "karyawans" => mk01::all(),
            "tg01_success" => $success,
            "tg01_danger" => $danger
        );
        return View::make('transaksi.trans_gaji', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id) {
        $mk01 = mk01::find($id);
        if ((int) date("m") == (int) strftime("%m", strtotime($mk01->tglgj))) {
            Session::flash('tg01_danger', 'Slip Gaji Karyawan tersebut Telah Dibuat!');
            return Redirect::to('inputdata/show_gaji_karyawan');
        } else {
            $tg01 = new tg01();
            $data = array(
                "karyawan" => mk01::find($id),
                "gajis" => $tg01->getDetailHariGaji($id, date("Y-m-d"))
            );
            return View::make('transaksi.trans_gaji_karyawan', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        if (count(Input::get("idgj")) > 0) {
            DB::transaction(function() {
                $idgj = Input::get("idgj");
                $nominalgj = Input::get("nominalgaji");
                $idkar = Input::get("idkar");

                $tg01 = new tg01();
                $idtg = $tg01->getAutoIncrement();

                $tg01->tgltg = date("Y-m-d");
                $tg01->status = "N";
                $tg01->idkar = $idkar;
                $tg01->save();

                for ($i = 0; $i < count($idgj); $i++) {
                    $tg02 = new tg02();
                    $tg02->tg01_id = $idtg;
                    $tg02->mg01_id = $idgj[$i];
                    $tg02->jmtgh = $nominalgj[$i];
                    $tg02->nmlgj = mg02::whereRaw('mk01_id = ? and mg01_id = ?', array($idkar, $idgj[$i]))->first()->nilgj;
                    $tg02->save();
                }

                $mk01 = mk01::find($idkar);
                $mk01->tglgj = date("Y-m-d");
                $mk01->save();
            });

            return Redirect::to('inputdata/gaji');
        } else {
            echo "There's no available payment!";
            exit;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show() {
        $success = Session::get('tg01_success');
        $danger = Session::get('tg01_danger');
        $data = array(
            "karyawans" => mk01::all(),
            "tg01_success" => $success,
            "tg01_danger" => $danger
        );
        return View::make('transaksi.trans_gaji_show_karyawan', $data);
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
