<?php

require_once("../controller/controllerDelete.php");

class Delete extends ControllerDelete{

    public function deleteCadastro($param){

        if($param == "produtos"){
            return $this->delCadatro($param);
        }
        
        http_response_code(404);
        return array("Message: "=> "Rota nao localizada, usar /produtos");
    }
}
