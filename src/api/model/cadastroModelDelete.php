<?php

include_once(dirname(__DIR__)."/repository/restmodel.php");

class CadastroDeleteModel {

    public function delCadastroModel($param){
        $del = new RestModel();
        
        $del->delete("product");
        $del->where(array("prd_id"=>$param));
        return $del->exec();

    }
}
