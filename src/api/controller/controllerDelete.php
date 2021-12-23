<?php

require_once("../model/cadastroModelDelete.php");

class ControllerDelete extends CadastroDeleteModel{

    public function delCadatro($id){
        try {
            $ret = $this->delCadastroModel($id);

            if($ret == 1){
                return "Registro com excluido com sucesso!";
            }
            return "Erro ao excluir registro.";
        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
