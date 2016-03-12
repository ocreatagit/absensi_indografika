<?php

class mj02 extends Eloquent {

    protected $table = 'mj02';
    protected $primaryKey = 'idjk';

    function mj03(){
        return $this->hasMany("mj03");
    }

//    function mk01() {
//        return $this->belongsToMany("mk01");
//    }

//    function Karyawan(){
//        return $this->belongsToMany("Karyawan", "mj03");
//    }

    function getJamKerjaAktif() {
        return $this->where('status', '=', 'Y')->where('tipe', '=', 1)->orderBy('idjk', 'ASC')->get();
    }

    function getJamIstirahatAktif() {
        return $this->where('status', '=', 'Y')->where('tipe', '=', 2)->orderBy('idjk', 'ASC')->get();
    }

}
