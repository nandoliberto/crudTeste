<?php

require_once("../model/cadastroModelGet.php");

class ControllerGet extends CadastroModelGet{

    public function getId($param){
        
        $ret = $this->modelGetId($param);

        if(count($ret)>0){
            http_response_code(302);
            return $ret;
        }
        http_response_code(404);
        $arr = array("Message: "=>"Registro nao encontrado.");
        return $arr;
    }

    public function getAll(){
       
        $ret = $this->modelGetAll();
        
        if(count($ret)>0){
            http_response_code(302);
            return $ret;
        }
        http_response_code(404);
        $arr = array("Message: "=>"Nenhum registro encontrado.");
        return $arr;
    }
}
