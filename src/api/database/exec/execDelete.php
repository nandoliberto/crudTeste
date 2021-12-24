<?php

require_once(dirname(__DIR__)."/database.php");

class DeleteDatabase extends Database{
    public function deleteExec($query){

        try {
            $this->log("[".date("Y-m-d H:i:s")."] "."Executando query -> ".$query);
            return mysqli_query($this->mysql, $query);
        } catch (\Exception $e) {
            $this->log("[".date("Y-m-d H:i:s")."] ". __FUNCTION__." ".$e->getMessage());
            throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
