<?php

require_once("../controller/controllerGet.php");

class Get extends ControllerGet{

    public function getCadastro($param){
        
        if($param[0] == "produtos" && is_numeric($param[1])){
            return $this->getId($param[1]);
        }

        return $this->getAll();
    }
}
