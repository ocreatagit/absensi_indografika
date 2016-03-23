<?php

class tg02 extends Eloquent {

    protected $table = 'tg02';
    
    function mg01(){
        return $this->belongsTo("mg01");
    }
    
    function tg01(){
        return $this->belongsTo("tg01");
    }
}
