<?php

require_once("../controller/controllerPut.php");

class Put extends ControllerPut{

    public function putCadastro($param, $obj){
        
        if($param == "produtos"){
            return $this->atualizaDados($obj);
        }

        http_response_code(404);
        return array("Message: "=> "Rota nao localizada, usar /produtos");
        
    }
}
