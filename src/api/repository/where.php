<?php

class Where{
    public function _where(array $param){

        try {
            
            if(count($param) == 1){
      
                foreach ($param as $key => $value) {
                    return " WHERE ".$key."='".$value."'";
                    $i++;
                }
            }else if(count($param) > 1){
                $arr;
                foreach ($param as $key => $value) {

                    if(!isset($arr)){
                        $arr  = " WHERE ".$key."='".$value."'";
                    }
                    $arr .= " AND ".$key."='".$value."'";
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
