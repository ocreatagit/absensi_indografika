<?php

class th01 extends Eloquent {

    protected $table = 'th01';
    protected $primaryKey = 'idhut';
    
    function mk01() {
        return $this->belongsTo("mk01");
    }
    
    function getAutoIncrement() {
        $sql = "SELECT AUTO_INCREMENT as idth FROM information_schema.tables WHERE TABLE_SCHEMA = 'absensi' AND TABLE_NAME = 'th01'";
        $th01 = DB::select(DB::raw($sql));
        $th01 = $th01[0];
        return $th01->idth;
    }
    
    function getHutangBlmLunas(){
        $sql = "SELECT th01.*, mk01.nama FROM th01 INNER JOIN mk01 ON mk01.idkar = th01.idkar WHERE th01.flglns = 'N';";
        $th01 = DB::select(DB::raw($sql));
        return $th01;
    }
    
    function getHutang($idhut) {
        $sql = "SELECT * FROM th02 WHERE th02.idhut = $idhut;";
        $th02 = DB::select(DB::raw($sql));
        return $th02;
    }
}
