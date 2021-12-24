<?php

require_once(dirname(__DIR__)."/controller/controllerGet.php");
require_once(dirname(__DIR__)."/utils/logs.php");

class Get extends ControllerGet{

    public function getCadastro($param){

        $logs = new Logs();
        
        if($param[0] == "produtos" && is_numeric($param[1])){

            $logs->writeLog("[".date("Y-m-d H:i:s")."] "."Requisicao GETID");
            return $this->getId($param[1]);
        }

        $logs->writeLog("[".date("Y-m-d H:i:s")."] "."Requisicao GETALL");
        return $this->getAll();
    }
}
