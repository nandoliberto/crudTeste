<?php

class GroupBy{
    public function _groupBy(string $param){
        try {
            $param = strtoupper($param);
            
            return " GROUP BY ".$param;

        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}
