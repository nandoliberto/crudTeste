<?php

require_once(dirname(__DIR__)."/controller/controllerDelete.php");

class Delete extends ControllerDelete{

    public function deleteCadastro($rota, $id){
        
        if($rota == "produtos"){
            return $this->delCadatro($id);
        }
        
        http_response_code(404);
        return array("Message: "=> "Rota nao localizada, usar /produtos");
    }
}
