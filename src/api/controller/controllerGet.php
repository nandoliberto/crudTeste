<?php

require_once(dirname(__DIR__)."/model/cadastroModelGet.php");
require_once(dirname(__DIR__)."/utils/logs.php");

class ControllerGet extends CadastroModelGet{

    public function getId($param){

        $this->log("[".date("Y-m-d H:i:s")."] "."Buscando registro com o id: ".$param);
        $ret = $this->modelGetId($param);

        if(count($ret)>0){
            
            $this->log("[".date("Y-m-d H:i:s")."] "."Registro localizado com sucesso");
            http_response_code(302);
            return $ret;
        }

        $this->log("[".date("Y-m-d H:i:s")."] "."Nenhum registro localizado");
        http_response_code(404);
        $arr = array("Message: "=>"Registro nao encontrado.");
        return $arr;
    }

    public function getAll(){
       
        $ret = $this->modelGetAll();
        
        if(count($ret)>0){
            $this->log("[".date("Y-m-d H:i:s")."] "."Retornando um total de ".count($ret)." registros");
            http_response_code(302);
            return $ret;
        }

        $this->log("[".date("Y-m-d H:i:s")."] "."Nenhum registro localizado");
        http_response_code(404);
        $arr = array("Message: "=>"Nenhum registro encontrado.");
        return $arr;
    }

    private function log($msg){
        $log = new Logs();
        $log->writeLog($msg);
    }
}
