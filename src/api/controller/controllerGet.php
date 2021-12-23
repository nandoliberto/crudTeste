<?php

require_once("../model/cadastroModelGet.php");

class ControllerGet extends CadastroModelGet{

    public function getId($param){
        return $this->modelGetId($param);
    }

    public function getAll(){
        return $this->modelGetAll();
    }
}
