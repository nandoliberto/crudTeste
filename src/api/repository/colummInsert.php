<?php

class ColummInsert {
    public function _colummInsert($param){
        try{
            
            if(!strpos($param, ",")){

                return $param.") values (";

            }else{
                
                $xpl = explode(",", trim($param));

                $arr;
                
                if(count($xpl) > 0){
                    
                    for ($i=0; $i < count($xpl); $i++) { 
                    
                        if(!isset($arr)){
                            $arr = $xpl[$i];
                            
                        }else{
                            $arr .= ",".$xpl[$i];
                        }
                    }
                    
                    return $arr .= ") values (";

                }else{
                    throw("Funçao ".__FUNCTION__.  " necessario pelo menos um parametro");
                }
            }
        }catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
