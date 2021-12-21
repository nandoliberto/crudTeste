<?php

class Inner{
    public function _inner(array $param){

        try {
            
            if(count($param) == 1){
                foreach ($param as $key => $value) {
                    return " INNER JOIN ".$key." ON ".$value;
                }
            }else if(count($param) > 1){
                $arr="";
                foreach ($param as $key => $value){

                    $arr .= " INNER JOIN ".$key." ON ".$value;
                }
                return $arr;
            }else{
                throw("Funçao ".__FUNCTION__.  " necessario pelo menos um parametro para o inner");
            }
        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}
