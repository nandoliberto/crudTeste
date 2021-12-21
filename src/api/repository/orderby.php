<?php

class OrderBy{
    public function _orderBy(string $param){
        try {
            $param = strtoupper($param);
            
            return " ORDER BY ".$param;
           
        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}
