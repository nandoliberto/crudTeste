<?php
include_once(dirname(__DIR__)."/model/cadastroModelPost.php");
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
                    http_response_code(500);
                    $arr = array("Message: "=>"Erro ao gravar dados.");
                    return $arr;
                }
                http_response_code(201);
                $arr = array("Message: "=>"Dados gravados com sucesso, id: ".$ret);
                return  $arr;
            }
            http_response_code(200);
            $arr = array("Message: "=>"Documento ja gravado anteriormente.");
            return $arr;
        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
