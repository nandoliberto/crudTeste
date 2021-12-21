<?php

class Limit {
    public function _limit(integer $param){
        try {
            $param = strtoupper($param);
            
            return " LIMIT ".$param;

        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}
