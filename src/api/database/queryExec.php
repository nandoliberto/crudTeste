<?php


require_once("/var/www/html/api/database/exec/execSelect.php");
require_once("/var/www/html/api/database/exec/execInsert.php");
require_once("/var/www/html/api/database/exec/execDelete.php");
require_once("/var/www/html/api/database/exec/execUpdate.php");

class QueryExec extends Database{

    private $mysql;
    private $ini;
    private $select;
    private $insert;
    private $delete;
    private $update;

    public function __construct(){
        $this->select = new SelectDatabase();
        $this->insert = new InsertDatabase();
        $this->delete = new DeleteDatabase();
        $this->update = new UpdateDatabase();
    }

    public function execQuery(string $query, string $param){

        if($param == "insert"){
            return $this->insert->insertExec($query);
        }
        
        if($param == "select"){
            return $this->select->selectExec($this->mysql, $query);
        }

        if($param == "delete"){
            return $this->delete->deleteExec($this->mysql, $query);                
        }

        if($param == "update"){
            return $this->update->updateExec($this->mysql, $query);
        }
    }
}
