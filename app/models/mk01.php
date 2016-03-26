<?php

class mk01 extends Eloquent {

    protected $table = 'mk01';
    protected $primaryKey = 'idkar';

    // START Eloquent Relationship
    function mj01() {
        return $this->belongsTo('mj01', 'idjb');
    }

    function mj03() {
        return $this->hasMany("mj03");
    }
    
    function mg02() {
        return $this->hasMany("mg02");
    }
    
    function th01() {
        return $this->hasMany("th01");
    }
    
    function tt01() {
        return $this->hasMany("tt01");
    }
    
    function tg01() {
        return $this->hasMany("tg01");
    }
    
    // END Eloquent Relationship

    function getJamKerja($idkar) {
        return DB::table('mk01')
                        ->select("mj02.idjk", "mj02.tipe", "mj02.jmmsk", "mj02.jmklr", "mj02.status")
                        ->join("mj03", "mj03.mk01_id", "=", "mk01.idkar")
                        ->join("mj02", "mj02.idjk", "=", "mj03.mj02_id")
                        ->where("tipe", 1)
                        ->where("idkar", $idkar)->first();
    }

    function getJamIstirahat($idkar) {
        return DB::table('mk01')
                        ->select("mj02.idjk", "mj02.tipe", "mj02.jmmsk", "mj02.jmklr", "mj02.status")
                        ->join("mj03", "mj03.mk01_id", "=", "mk01.idkar")
                        ->join("mj02", "mj02.idjk", "=", "mj03.mj02_id")
                        ->where("tipe", 2)
                        ->where("idkar", $idkar)->first();
    }

    function getKaryawanAktif() {
        return $this->where('status', '=', 'Y')->orderBy('idkar', 'ASC')->get();
    }

    function getAutoIncrement() {
        $sql = "SELECT AUTO_INCREMENT as idkar FROM information_schema.tables WHERE  TABLE_SCHEMA = 'absensi' AND TABLE_NAME = 'mk01'";
        $mk01 = DB::select(DB::raw($sql));
        $mk01 = $mk01[0];
        return $mk01->idkar;
    }
}
