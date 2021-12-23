<?php

require_once("/var/www/html/api/database/database.php");

class UpdateDatabase extends Database{

    public function updateExec($query){
        
        try {
            return mysqli_query($this->mysql, $query);
        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
