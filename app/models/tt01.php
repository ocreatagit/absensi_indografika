<?php

class tt01 extends Eloquent {

    protected $table = 'tt01';
    protected $primaryKey = 'idtb';

    function mk01() {
        return $this->belongsTo("mk01");
    }

    function getAutoIncrement() {
        $sql = "SELECT AUTO_INCREMENT as idtb FROM information_schema.tables WHERE TABLE_SCHEMA = 'absensi' AND TABLE_NAME = 'tt01'";
        $tt01 = DB::select(DB::raw($sql));
        $tt01 = $tt01[0];
        return $tt01->idtb;
    }

    function getTabungan() {
        $sql = "SELECT tt01.*, mk01.nama FROM tt01 INNER JOIN mk01 ON mk01.idkar = tt01.idkar;";
        $tt01 = DB::select(DB::raw($sql));
        return $tt01;
    }

    function getTabunganGaji($idkar, $date) {
        $sql = "SELECT * FROM tt01 WHERE MONTH(tt01.tgltb) = " . date("n", strtotime($date)) . " AND YEAR(tt01.tgltb) = " . date("Y", strtotime($date)) . " AND tt01.idkar = $idkar;";
        $tt01 = DB::select(DB::raw($sql));
        return $tt01;
    }

    function getKarTabungan($id) {
        $sql = "SELECT tt01.*, mk01.nama FROM tt01 INNER JOIN mk01 ON mk01.idkar = tt01.idkar WHERE tt01.idtb = $id";
        $tt01 = DB::select(DB::raw($sql));
        return $tt01;
    }

    function getLatestTabungan($idkar, $date) {
        $sql = "SELECT * FROM tt01 WHERE idkar = $idkar AND MONTH(tgltb) = " . date("n", strtotime($date)) . ";";
        $tt01 = DB::select(DB::raw($sql));
        return $tt01;
    }

}
