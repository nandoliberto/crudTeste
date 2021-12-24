<?php

require_once("/var/www/html/api/database/database.php");

class SelectDatabase extends Database{

    public function selectExec($query){

        try {
            $this->log("[".date("Y-m-d H:i:s")."] "."Executando query -> ".$query);
            $ret = array();
            $consulta = mysqli_query($this->mysql, $query);
            $i=0;
            while($linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                
                $ret[$i]["ID"] = (int)$linha["ID"];
                $ret[$i]["SKU"] = $linha["SKU"];
                $ret[$i]["PRODUCTNAME"] = $linha["NAME"];
                $ret[$i]["PRICE"] = (float)$linha["PRICE"];
                $ret[$i]["QTD"] = (int)$linha["QTD"];
                $ret[$i]["CATEGORY"] = $linha["CATEGORY"];
                $ret[$i]["DESCRICAO"] = $linha["DESCRICAO"];
                $i++;
            }

            return $ret;
        } catch (\Exception $e) {
            $this->log("[".date("Y-m-d H:i:s")."] ". __FUNCTION__." ".$e->getMessage());
            throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
