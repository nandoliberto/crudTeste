<?php

require_once("../model/cadastroModelDelete.php");

class ControllerDelete extends CadastroDeleteModel{

    public function delCadatro($id){
        try {
            $ret = $this->delCadastroModel($id);

            if($ret == 1){
                http_response_code(200);
                $arr = array("Message: "=>"Registro com excluido com sucesso!");
                return $arr;
            }
            http_response_code(500);
            $arr = array("Message: "=>"Erro ao excluir registro.");
            return $arr;
        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
