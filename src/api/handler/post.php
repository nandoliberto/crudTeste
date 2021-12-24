<?php

require_once(dirname(__DIR__)."/controller/controllerPost.php");

class Post extends ControllerPost{

    public function postCadastro($param, $obj){

        if($param == "produtos"){
            return $this->gravaDados($obj);
        }
        http_response_code(404);
        return array("Message: "=> "Rota nao localizada, usar /produtos");
    }
}
