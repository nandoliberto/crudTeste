<?php

class Select {

    public function _select(string $param){
        
        try{

            return "SELECT ".$param." FROM ";
            
        }catch(\Exception $e){
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}
