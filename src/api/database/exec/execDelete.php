<?php

require_once("/var/www/html/api/database/database.php");

class DeleteDatabase extends Database{
    public function deleteExec($query){
        try {
            return mysqli_query($this->mysql, $query);
        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
