<?php

class mg02 extends Eloquent {
    protected $table = 'mg02';
    
    function mk01(){
        return $this->belongsTo("mk01");
    }
    
    function mg01(){
        return $this->belongsTo("mg01");
    }
}
