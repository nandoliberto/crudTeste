<?php

class UtilsAuth{

    public function valHeaders($call){

        try {
            if($call["Content-Type"] == "application/json"){
                return false;
            }
            return 'CONTENT_TYPE INVALIDO, UTILIZAR APPLICATION/JSON';
        } catch (\Exception $e) {
            throw("Error: ".__FUNCTION__." ". $e->getMessage());
        }
    }
    
    public function getQueryParams($url){
        return explode('/', rtrim(ltrim($_GET["url"], '/'),'/'));
    }
}
