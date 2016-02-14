<?php

class GajiModel extends Eloquent {

    protected $table = 'mg01';
    protected $primaryKey = 'idgj';
    
    function getJenisGajiAktif(){
        return $this->where('status', '=', 'Y')->orderBy('idgj', 'ASC')->get();
    }
}
