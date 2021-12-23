<?php

require_once("../controller/controllerGet.php");

class Get extends ControllerGet{

    public function getCadastro($param){
        
       if(isset($param[0]) && $param[0] != ""){
            return $this->getId($param);
        }

        return $this->getAll();
    }
}
