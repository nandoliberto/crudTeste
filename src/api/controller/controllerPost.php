<?php
include_once("../model/cadastroModelPost.php");
require_once("valDataPost/valDataPost.php");

class ControllerPost extends CadastroModel{

    public function gravaDados($param){
        try {
            $valDatapost = new ValDataPost();
        
            $retVerifyData = $valDatapost->verifyData($param);
            
            if($retVerifyData){
                return $retVerifyData;
            }

            $register = $this->verifyRegisterModel($param);

            if($register == 0){
                $ret = $this->insertCad($param);

                if(!$ret){
                    return "Erro ao gravar dados.";
                }
                return  "Dados gravados com sucesso, id: ".$ret;
            }
            return "Documento ja gravado anteriormente";
        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
