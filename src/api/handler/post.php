<?php

require_once(dirname(__DIR__)."/controller/controllerPost.php");
require_once(dirname(__DIR__)."/utils/logs.php");

class Post extends ControllerPost{

    public function postCadastro($param, $obj){
        $logs = new Logs();

        if($param == "produtos"){
            $logs->writeLog("[".date("Y-m-d H:i:s")."] "."Requisicao POST");
            return $this->gravaDados($obj);
        }

        $logs->writeLog("[".date("Y-m-d H:i:s")."] "."Requisicao POST com rota invalida");
        http_response_code(404);
        return array("Message: "=> "Rota nao localizada, usar /produtos");
    }
}
