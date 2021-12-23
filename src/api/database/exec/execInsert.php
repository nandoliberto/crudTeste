<?php

require_once("/var/www/html/api/database/database.php");

class InsertDatabase extends Database{

    public function insertExec($query){
        
        try {
            $exe = mysqli_query($this->mysql, $query);

            return $exe;
        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }
}
