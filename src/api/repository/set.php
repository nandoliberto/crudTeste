<?php

class Set{
    public function _set(array $param){
        try {
            $param = strtoupper($param);
            
            if(count($param) == 1){
                
                foreach ($param as $key => $value) {
                    
                    return " SET ".$key."='".$value."'";
                }

            }else if(count($param) > 1){
                $arr="";
                foreach ($param as $key => $value) {

                    if(!isset($this->set)){
                        $$arr  = " SET ".$key."='".$value."'";
                    }else{
                        $arr.= " AND ".$key."='".$value."'";
                    }
                }

                return $arr;
            }else{
                
                throw("Funçao ".__FUNCTION__.  " necessario pelo menos um parametro para o where");
            }
        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}
