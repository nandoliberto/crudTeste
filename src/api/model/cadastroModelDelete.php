<?php

include_once("../repository/restmodel.php");

class CadastroDeleteModel {

    public function delCadastroModel($param){
        $del = new RestModel();
        
        $del->delete("product");
        $del->where(array("prd_id"=>$param));
        return $del->exec();

    }
}