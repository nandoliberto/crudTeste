<?php

require_once(dirname(__DIR__)."/model/cadastroModelPut.php");
require_once("valDataPut/valDataPut.php");
require_once("valDataPut/constructArrayPut.php");

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
                    http_response_code(202);
                    $arr = array("Message: "=>"registro atualizado com sucesso.");
                    return $arr;
                }
                http_response_code(500);
                $arr = array("Message: "=>"Erro ao atualizar registro.");
                return $arr;
            }
            http_response_code(404);
            $arr = array("Message: "=>"Registro inexistente.");
            return $arr;

        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
