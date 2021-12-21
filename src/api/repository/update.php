<?php

class Update{
    public function _update(string $param){
        try {
            $param = strtoupper($param);

            return "UPDATE ".$param;
            
        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}
