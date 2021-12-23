<?php

require_once("../controller/controllerPut.php");

class Put extends ControllerPut{

    public function putCadastro($obj){
        
        return $this->atualizaDados($obj);
    }
}
