<?php

class VerifyRegister{

    public function valRegister(string $tabela, array $where){
        
        if(count($where) == 1){
            
            foreach ($where as $key => $value) {
                
                return "SELECT * from ".$tabela." WHERE ".$key."='".$value."'";
            }

        }else if(count($where) > 1){
            
            $arr;
            foreach ($where as $key => $value) {
                
                if(!isset($arr)){
                    $arr  = " WHERE ".$key."='".$value."'";
                }else{
                    $arr .= " AND ".$key."='".$value."'";
                }
            }
            
            return "SELECT * from ".$tabela.$arr;

        }else{
            throw("Funçao ".__FUNCTION__.  " necessario pelo menos um parametro para o inner");
        }
    }
}
