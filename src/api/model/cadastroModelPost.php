<?php

include_once(dirname(__DIR__)."/repository/restmodel.php");

class CadastroModel extends Restmodel{

    public function insertCad($dados){
        
        $this->insert("product");
        $this->colummInsert("prd_sku, prd_name, prd_price, prd_qtd, prd_category, prd_descricao");
        $this->valueInsert($dados->sku.",".$dados->productName.",".$dados->price.",".$dados->qtd.",".$dados->category.",".$dados->descricao);
        
        $ret = $this->exec();
        
        return $ret;

    }

    public function verifyRegisterModel($dados){

        $this->valRegister("product", array("prd_sku"=>$dados->sku, "prd_name"=>$dados->productName, "prd_category"=>$dados->category));
        $ret = $this->exec();
        
        return $ret;
    }
}
