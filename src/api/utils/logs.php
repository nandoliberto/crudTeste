<?php
date_default_timezone_set("America/Bahia");
class Logs{

    public function writeLog($msg){
        try {
            file_put_contents("/var/www/html/Logs/Logs.txt", $msg.";".PHP_EOL, FILE_APPEND);
        } catch (\Exeception $e) {
            throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
        
    }
}