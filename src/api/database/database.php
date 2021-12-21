<?php

class Database{

    private $pdo;
    private $ini;

    public function __construct(){
        
        $this->ini = $this->loadConfig();

        try {

            $this->pdo = new PDO("mysql:host=".$this->ini["DATABASE"]["host"].";dbname=".$this->ini["DATABASE"]["db"], $this->ini["DATABASE"]["user"], $this->ini["DATABASE"]["pass"]);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        } catch (\PDOException $e) {
            throw("erro de conexao: ". $e->getMessage());
        }
    }

    public function execQuery(string $query, string $param){
        
        try {
            
            if($param == "insert"){
                if($this->pdo->exec($query)){
                    return $this->pdo->lastInsertId();
                }
            }
            
            if($param == "select"){
                //die(var_dump($query));
                $ret = array();
                $consulta = $this->pdo->query($query);
                $i=0;
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    //return $linha;
                    $ret[$i]["ID"] = $linha["ID"];
                    $ret[$i]["SKU"] = $linha["SKU"];
                    $ret[$i]["NAME"] = $linha["NAME"];
                    $ret[$i]["PRICE"] = $linha["Price"];
                    $ret[$i]["QTD"] = $linha["QTD"];
                    $ret[$i]["CATEGORY"] = $linha["CATEGORY"];
                    $ret[$i]["DESCRICAO"] = $linha["DESCRICAO"];
                    $i++;
                }

                return $ret;
            }

            if($param == "delete"){

                $ret = $this->pdo->exec($query);

                if($ret == 1){
                    return "registro excluido com sucesso";
                }
            }
            
            
        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }
    }

    public function loadConfig (){
       
        if(file_exists(dirname(__FILE__)."/../.env")){
            return parse_ini_file(dirname(__FILE__)."/../.env", true);
        }else{
            $env = getenv();
            return array(
                "DATABASE" => array(
                    "host" => $env["DATABASE_HOST"],
                    "port" => $env["DATABASE_PORT"],
                    "db" => $env["DATABASE_DB"],
                    "user" => $env["DATABASE_USER"],
                    "pass" => $env["DATABASE_PASS"],
                    "charset" => $env["DATABASE_CHARSET"]
                ),
                "PATH" => array(
                    "log" => $env["PATH_LOG"],
                ),
            );
        }
    }
}
