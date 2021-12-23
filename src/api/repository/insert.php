<?php

class Insert{
    public function _insert($param){
        try {
            
            return "INSERT INTO ".$param." (";

        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
