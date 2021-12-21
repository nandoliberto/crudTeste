<?php

class ValiueInsert{

    public function _valueInsert($param){
        
        try{
            $param = strtoupper($param);
            
            if(!strpos($param, ",")){
                return $param."'".$param."');";
            }else{

                $xpl = explode(",", $param);

                $arr;

                if(count($xpl) > 0){
                    for ($i=0; $i < count($xpl); $i++) { 

                        if(!isset($arr)){
                            $arr = "'".$xpl[$i]."'";
                        }else{
                            $arr .= ",'".$xpl[$i]."'";
                        }
                    }
    
                    return $arr .= ");";
                }else{
                    throw("Funçao ".__FUNCTION__.  " necessario pelo menos um parametro");
                }
            }
        }catch (\Exception $e) {
            throw("Erro: ".__FUNCTION__." ". $e->getMessage());
        }
    }
}
