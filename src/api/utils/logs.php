<?php
date_default_timezone_set("America/Bahia");
class Logs{

    public function writeLog($msg){
        try {
            
            if(!is_dir("/var/www/html/Logs/")){
                mkdir("/var/www/html/Logs/");
            }

            file_put_contents("/var/www/html/Logs/Logs_".date("Y_m_d")."_.txt", $msg.";".PHP_EOL, FILE_APPEND);
        } catch (\Exeception $e) {
            throw(json_encode("Erro :".__FUNCTION__." ". $e->getMessage()));
        }
        
    }
}
