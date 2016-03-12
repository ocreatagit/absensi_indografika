<?php

class mj03 extends Eloquent {

    protected $table = 'mj03';
    
    function mk01(){
        return $this->belongsTo("mk01");
    }
    
    function mj02(){
        return $this->belongsTo("mj02");
    }
}
