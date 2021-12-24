<?php

require_once(dirname(__DIR__)."/model/cadastroModelPut.php");
require_once("valDataPut/valDataPut.php");
require_once("valDataPut/constructArrayPut.php");
require_once(dirname(__DIR__)."/utils/logs.php");

class ControllerPut extends CadastroModelPut{

    public function atualizaDados($dados){

        try {
            $valDataput = new ValDataPut();
        
            $retVerifyData = $valDataput->verifyData($dados);
            
            if($retVerifyData){
                return $retVerifyData;
            }
            
            $constructArray = new ConstructArrayPut();
            
            $arr = $constructArray->constructArray($dados);

            $register = $this->verifyRegisterModel($arr);
            
            if($register > 0){
                $ret = $this->atzDadosModel($arr);
                
                if($ret){
                    $this->log("[".date("Y-m-d H:i:s")."] "."registro com id: ".$dados->id." atualizado com sucesso, dados informados: ".json_encode($dados));
                    http_response_code(202);
                    $arr = array("Message: "=>"registro atualizado com sucesso.");
                    return $arr;
                }

                $this->log("[".date("Y-m-d H:i:s")."] "."Erro ao atualizar registro, ".json_encode($dados));
                http_response_code(500);
                $arr = array("Message: "=>"Erro ao atualizar registro.");
                return $arr;
            }

            $this->log("[".date("Y-m-d H:i:s")."] "."Registro inexistente, ".json_encode($dados));
            http_response_code(404);
            $arr = array("Message: "=>"Registro inexistente.");
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
