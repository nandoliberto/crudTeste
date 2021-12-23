<?php

require_once("/var/www/html/api/database/database.php");

class VerifyRegisterDatabase extends Database{

    public function registerExec($query){
        try {
            
            $exe = mysqli_query($this->mysql, $query);

            $ret = mysqli_num_rows($exe);
            
            return $ret;
        } catch (\Exception $e) {
           throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
    }
}
