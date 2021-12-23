<?php

require_once("../model/cadastroModelPut.php");
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
                    return "registro atualizado com sucesso.";
                }
                return "Erro ao atualizar registro";
            }
            return "Registro inexistente";

        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
