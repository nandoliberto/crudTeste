<?php

class Set{
    public function _set(array $param){
        try {

            if(count($param) == 1){
                
                foreach ($param as $key => $value) {
                    
                    return " SET ".$key."='".strtoupper($value)."'";
                }

            }else if(count($param) > 1){
                $arr;
                foreach ($param as $key => $value) {
                    
                    if(!isset($arr)){
                        $arr  = " SET ".$key."='".strtoupper($value)."'";
                    }else{
                        $arr.= " ,".$key."='".strtoupper($value)."'";
                    }
                }
                
                return $arr;
            }else{
                
                throw("Funçao ".__FUNCTION__.  " necessario pelo menos um parametro para o where");
            }
        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
