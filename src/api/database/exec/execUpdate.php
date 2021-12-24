<?php

require_once("/var/www/html/api/database/database.php");

class UpdateDatabase extends Database{

    public function updateExec($query){
        
        try {
            $this->log("[".date("Y-m-d H:i:s")."] "."Executando query -> ".$query);
            return mysqli_query($this->mysql, $query);
        } catch (\Exception $e) {
            $this->log("[".date("Y-m-d H:i:s")."] ". __FUNCTION__." ".$e->getMessage());
            throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
