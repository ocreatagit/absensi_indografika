<?php

class tt01 extends Eloquent {

    protected $table = 'tt01';
    protected $primaryKey = 'idtb';
    
    function mk01() {
        return $this->belongsTo("mk01");
    }
    
    function getTabungan(){
        $sql = "SELECT tt01.*, mk01.nama FROM tt01 INNER JOIN mk01 ON mk01.idkar = tt01.idkar;";
        $tt01 = DB::select(DB::raw($sql));
        return $tt01;
    }
}
