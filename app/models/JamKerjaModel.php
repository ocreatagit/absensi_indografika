<?php

class JamKerjaModel extends Eloquent {

    protected $table = 'mj02';
    protected $primaryKey = 'idjk';
    
    function getJamKerjaAktif() {
        return $this->where('status', '=', 'Y')->where('tipe', '=', 1)->orderBy('idjk', 'ASC')->get();
    }
    
    function getJamIstirahatAktif() {
        return $this->where('status', '=', 'Y')->where('tipe', '=', 2)->orderBy('idjk', 'ASC')->get();
    }
}
