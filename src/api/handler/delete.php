<?php

require_once(dirname(__DIR__)."/controller/controllerDelete.php");
require_once(dirname(__DIR__)."/utils/logs.php");

class Delete extends ControllerDelete{

    public function deleteCadastro($rota, $id){

        $logs = new Logs();
        
        if($rota == "produtos"){
            $logs->writeLog("[".date("Y-m-d H:i:s")."] "."Requisicao DELETE");
            return $this->delCadatro($id);
        }
        
        $logs->writeLog("[".date("Y-m-d H:i:s")."] "."Requisicao DELETE com rota invalida");
        http_response_code(404);
        return array("Message: "=> "Rota nao localizada, usar /produtos");
    }
}
