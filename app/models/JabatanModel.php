<?php

class JabatanModel extends Eloquent {

    protected $table = 'mj01';
    protected $primaryKey = 'idjb';
    
    function getJabatanAktif() {
        return $this->where('status', '=', 'Y')->orderBy('idjb', 'ASC')->get();
    }
}
