<?php

class VerifyRegister{

    public function valRegister(string $tabela, array $where){

        if(count($where) == 1){

        }else if(count($where) > 1){

            $arr="";
            foreach ($where as $key => $value) {

                if(!isset($arr)){
                    $arr  = " WHERE ".$key."='".$value."'";
                }
                $arr .= " AND ".$key."='".$value."'";
            }

            $sql = "SELECT count (*) from ".$tabela.$arr;
        }else{
            throw("Funçao ".__FUNCTION__.  " necessario pelo menos um parametro para o inner");
        }
    }
}
