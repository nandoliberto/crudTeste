<?php

require_once("../controller/controllerGet.php");
;
class Get{

    public function getCadastro($param){

        $get = new ControllerGet();

        if(isset($param[1])){
            return $get->getId($param[1]);
        }

        return $get->getAll();
    }
}