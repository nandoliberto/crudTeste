<?php

class SelectDatabase{

    public function selectExec($pdo, $query){

        // try {
        //     $ret = array();
        //     $consulta = $pdo->query($query);
        //     $i=0;
        //     while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                
        //         $ret[$i]["ID"] = $linha["ID"];
        //         $ret[$i]["SKU"] = $linha["SKU"];
        //         $ret[$i]["NAME"] = $linha["NAME"];
        //         $ret[$i]["PRICE"] = $linha["Price"];
        //         $ret[$i]["QTD"] = $linha["QTD"];
        //         $ret[$i]["CATEGORY"] = $linha["CATEGORY"];
        //         $ret[$i]["DESCRICAO"] = $linha["DESCRICAO"];
        //         $i++;
        //     }

        //     return $ret;
        // } catch (\Exception $e) {
        //     throw("Erro :".__FUNCTION__." ". $e->getMessage());
        // }
    }
}