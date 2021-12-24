<?php

class UtilsRestModel{

    public function xplParam($param){
        
        return explode(",", $param);

    }

    public function verifyString($param){

        if(strpos($param, "SELECT") or strpos($param, "FROM") 
        or strpos($param, "JOIN") or strpos($param, "WHERE")
        or strpos($param, "DELETE") or strpos($param, "UPDATE")
        or strpos($param, "ORDER") or strpos($param, "GROUP")
        or strpos($param, "BY")){
            return true;
        }
        return false;
    }
}
