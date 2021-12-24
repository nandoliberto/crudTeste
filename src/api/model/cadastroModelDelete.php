<?php

require_once(dirname(__DIR__)."/repository/restmodel.php");

class CadastroDeleteModel extends RestModel{

    public function delCadastroModel($param){
        
        $this->delete("product");
        $this->where(array("prd_id"=>$param));
        return $this->exec();

    }
}
