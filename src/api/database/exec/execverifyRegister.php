<?php

require_once("/var/www/html/api/database/database.php");

class VerifyRegisterDatabase extends Database{

    public function registerExec($query){
        try {
            
            $this->log("[".date("Y-m-d H:i:s")."] "."Executando query -> ".$query);
            $exe = mysqli_query($this->mysql, $query);

            $ret = mysqli_num_rows($exe);
            
            return $ret;
        } catch (\Exception $e) {
            $this->log("[".date("Y-m-d H:i:s")."] ". __FUNCTION__." ".$e->getMessage());
            throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
