<?php

class From{
    public function _from(string $param){

        try {
            
            if(isset($param)){
                return $param;
            }else{
                throw("Funçao ".__FUNCTION__.  "necessita de um parametro em formato de string");
            }
        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}