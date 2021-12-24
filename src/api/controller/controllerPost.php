<?php
require_once(dirname(__DIR__)."/model/cadastroModelPost.php");
require_once("valDataPost/valDataPost.php");
require_once(dirname(__DIR__)."/utils/logs.php");

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
                    $this->log("[".date("Y-m-d H:i:s")."] "."Erro ao gravar dados, ".json_encode($param));
                    http_response_code(500);
                    $arr = array("Message: "=>"Erro ao gravar dados.");
                    return $arr;
                }

                $this->log("[".date("Y-m-d H:i:s")."] "."Dados ".json_encode($param)." gravados com sucesso, id: ".$ret);
                http_response_code(201);
                $arr = array("Message: "=>"Dados gravados com sucesso, id: ".$ret);
                return  $arr;
            }

            $this->log("[".date("Y-m-d H:i:s")."] "."Documento ja gravado anteriormente, dados do informados = ".json_encode($param));
            http_response_code(200);
            $arr = array("Message: "=>"Documento ja gravado anteriormente.");
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
