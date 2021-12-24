<?php

require_once("/var/www/html/api/database/database.php");

class InsertDatabase extends Database{

    public function insertExec($query){
        
        try {
            $this->log("[".date("Y-m-d H:i:s")."] "."Executando query -> ".$query);
            $exe = mysqli_query($this->mysql, $query);
            if($exe){
                $exe2 = $this->mysql->insert_id;
                return $exe2;
            }
            return $ret;
        } catch (\Exception $e) {
            $this->log("[".date("Y-m-d H:i:s")."] ". __FUNCTION__." ".$e->getMessage());
            throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
