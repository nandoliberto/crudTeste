<?php

class Update{
    public function _update(string $param){
        try {

            return "UPDATE ".$param;
            
        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
