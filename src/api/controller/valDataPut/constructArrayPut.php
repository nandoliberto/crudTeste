<?php

class ConstructArrayPut{

    public function constructArray(object $arrObjData, array $arrSkipIndices = array()){

        $arrData = array();
        if (is_object($arrObjData)) {
            $arrObjData = get_object_vars($arrObjData);
        }
        if (is_array($arrObjData)) {
            foreach ($arrObjData as $index => $value) {
                if (is_object($value) || is_array($value)) {
                    $value = $this->objectsIntoArray($value, $arrSkipIndices);
                }
                if (in_array($index, $arrSkipIndices)) {
                    continue;
                }
                $arrData[$index] = $value;
            }
        }
        return $this->makeDados($arrData);
    }

    private function makeDados($arrayDados){

        $arr = array();

        $arr["retorno"]["prd_id"] = $arrayDados["id"];

        if(isset($arrayDados["sku"])){
            $arr["retorno"]["prd_sku"] = $arrayDados["sku"];
        }

        if(isset($arrayDados["productName"])){
            $arr["retorno"]["prd_name"] = $arrayDados["productName"];
        }

        if(isset($arrayDados["price"])){
            $arr["retorno"]["prd_price"] = $arrayDados["price"];
        }

        if(isset($arrayDados["qtd"])){
            $arr["retorno"]["prd_qtd"] = $arrayDados["qtd"];
        }

        if(isset($arrayDados["category"])){
            $arr["retorno"]["prd_category"] = $arrayDados["category"];
        }

        if(isset($arrayDados["descricao"])){
            $arr["retorno"]["prd_descricao"] = $arrayDados["descricao"];
        }

        return $arr["retorno"];
    }
}
