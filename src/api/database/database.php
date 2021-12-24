<?php

require_once(dirname(__DIR__)."/utils/logs.php");

class Database{

    public function __construct(){
        
        $this->ini = $this->loadConfig();
        
        try {
            $this->mysql = mysqli_connect (
              $this->ini['DATABASE']['host']
            , $this->ini['DATABASE']['user']
            , $this->ini['DATABASE']['pass']
            , $this->ini['DATABASE']['db']
            , $this->ini['DATABASE']['port']
            );
            
        } catch (Exception $e) {
            throw('"_ERRO_DB":"' . $e . '"');
        } catch (Throwable $e) {
            throw('"_ERRO_DB":"' . $e . '"');
        }
    }

    public function loadConfig (){
        
        if(file_exists(dirname(__FILE__)."/../.env")){
            
            return parse_ini_file(dirname(__FILE__)."/../.env", true);
        }else{
            
            $env = getenv();
           
            $ret = array(
                "DATABASE" => array(
                    "host" => $env["DATABASE_HOST"],
                    "port" => $env["DATABASE_PORT"],
                    "db" => $env["DATABASE_DB"],
                    "user" => $env["DATABASE_USER"],
                    "pass" => $env["DATABASE_PASS"],
                    "charset" => $env["DATABASE_CHARSET"]
                ),
            );

            return $ret;
        }
    }

    public function log($msg){
        $log = new Logs();
        $log->writeLog($msg);
    }
}
