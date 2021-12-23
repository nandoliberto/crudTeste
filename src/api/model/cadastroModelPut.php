<?php

include_once("../repository/restmodel.php");

class CadastroModelPut extends Restmodel{

    public function atzDadosModel(array $dados){
       
        $this->update("product");
        $this->set($dados);
        $this->where(array("prd_id"=>$dados["prd_id"]));
        $ret = $this->exec();

        return $ret;
    }

    public function verifyRegisterModel($dados){

        $this->valRegister("product", array("prd_id"=>$dados["prd_id"]));
        $ret = $this->exec();
        
        return $ret;
    }
}
