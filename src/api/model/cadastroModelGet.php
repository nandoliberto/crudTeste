<?php

include_once("../repository/restmodel.php");

class CadastroModelGet extends Restmodel{

    public function modelGetId($param){
        
        $this->select("prd_id as ID, prd_sku as SKU, prd_name as NAME, prd_price as PRICE, prd_qtd as QTD, prd_category as CATEGORY, prd_descricao as DESCRICAO");
        $this->from("product");
        $this->where(array("prd_id"=>$param));
        $ret = $this->exec();
        return $ret;
    }

    public function modelGetAll(){
        $this->select("prd_id as ID, prd_sku as SKU, prd_name as NAME, prd_price as PRICE, prd_qtd as QTD, prd_category as CATEGORY, prd_descricao as DESCRICAO");
        $this->from("product");
        $ret = $this->exec();
       
        return $ret;
    }
}
