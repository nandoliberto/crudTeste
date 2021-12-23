<?php
include_once("../model/cadastroModelPost.php");
require_once("valDataPost/valDataPost.php");

class ControllerPost extends CadastroModel{

    public function gravaDados($param){

        $valDatapost = new ValDataPost();
        
        $retVerifyData = $valDatapost->verifyData($param);
        
        if($retVerifyData){
            return $retVerifyData;
        }
        
        $ret = $this->insertCad($param);
        
        if(!$ret){
            return "Erro ao gravar dados.";
        }elseif($ret == "docExist"){
            return "Documento ja gravado anteriormente";
        }

        return  "Dados gravados com sucesso!";
    }
}
