<?php

class Insert{
    public function _insert($param){
        try {
            
            return "INSERT INTO ".$param." (";

        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}
