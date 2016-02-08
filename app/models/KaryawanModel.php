<?php

class KaryawanModel extends Eloquent {

    protected $table = 'mk01';
    protected $primaryKey = 'idkar';

    function getKaryawanAktif() {
        return $this->where('status', '=', 'Y')->orderBy('idkar', 'ASC')->get();
    }

}
