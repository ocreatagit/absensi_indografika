<?php

class tz01 extends Eloquent {

    protected $table = 'tz01';
    protected $primaryKey = 'id';

    function getOmzet() {
        $sql = "SELECT tz01.*, mk01.nama FROM tz01 INNER JOIN mk01 ON mk01.idkar = tz01.idkar;";
        $tt01 = DB::select(DB::raw($sql));
        return $tt01;
    }

    function getOmzetIndividu($idkar, $date) {
        $sql = "SELECT tz01.*, mk01.nama FROM tz01 INNER JOIN mk01 ON mk01.idkar = tz01.idkar WHERE tz01.idkar = $idkar AND MONTH(tz01.tglomz) = ".date("n", strtotime($date)).";";
        $tz01 = DB::select(DB::raw($sql));
        $tz01 = $tz01[0];
        return $tz01->nilomz;
    }
    
    function getOmzetTim($idkar, $date) {
        $sql = "SELECT SUM(tz01.nilomz) as nilomz FROM tz01 WHERE tz01.idkar IN (SELECT mk02.mk01_id_child FROM mk02 WHERE mk02.mk01_id_parent = $idkar) AND MONTH(tz01.tglomz) = ".date("n", strtotime($date)).";";
        $tz01 = DB::select(DB::raw($sql));
        $tz01 = $tz01[0];
        return $tz01->nilomz;
    }

}
