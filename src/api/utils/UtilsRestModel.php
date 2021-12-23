<?php

class UtilsRestModel{

    public function xplParam($param){
        
        return explode(",", $param);

    }

    public function verifyString($param){

        if(strpos($param, "SELECT") || strpos($param, "FROM") 
        || strpos($param, "JOIN") || strpos($param, "WHERE")
        || strpos($param, "DELETE") || strpos($param, "UPDATE")
        || strpos($param, "ORDER") || strpos($param, "GROUP")
        || strpos($param, "BY")){
            return true;
        }
        return false;
    }
}
