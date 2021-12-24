<?php

require_once(dirname(__DIR__)."/controller/controllerPut.php");
require_once(dirname(__DIR__)."/utils/logs.php");

class Put extends ControllerPut{

    public function putCadastro($param, $obj){
        $logs = new Logs();
        
        if($param == "produtos"){
            $logs->writeLog("[".date("Y-m-d H:i:s")."] "."Requisicao PUT");
            return $this->atualizaDados($obj);
        }

        $logs->writeLog("[".date("Y-m-d H:i:s")."] "."Requisicao PUT com rota invalida");
        http_response_code(404);
        return array("Message: "=> "Rota nao localizada, usar /produtos");
        
    }
}
