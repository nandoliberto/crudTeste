<?php

require_once(dirname(__DIR__)."/model/cadastroModelDelete.php");
require_once(dirname(__DIR__)."/utils/logs.php");

class ControllerDelete extends CadastroDeleteModel{

    public function delCadatro($id){
        try {

            $this->log("[".date("Y-m-d H:i:s")."] "."Solicitando o delete do registro com ID: ".$id);
            $ret = $this->delCadastroModel($id);

            if($ret == 1){
                $this->log("[".date("Y-m-d H:i:s")."] "."Registro com excluido com sucesso");
                http_response_code(200);
                $arr = array("Message: "=>"Registro com excluido com sucesso!");
                return $arr;
            }

            $this->log("[".date("Y-m-d H:i:s")."] "."Erro ao excluir registro");
            http_response_code(500);
            $arr = array("Message: "=>"Erro ao excluir registro.");
            return $arr;
        } catch (\Exception $e) {
            $this->log("[".date("Y-m-d H:i:s")."] ". __FUNCTION__." ".$e->getMessage());
            throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }

    private function log($msg){
        $log = new Logs();
        $log->writeLog($msg);
    }
}
