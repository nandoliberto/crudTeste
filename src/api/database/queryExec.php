<?php


require_once(dirname(__DIR__)."/database/exec/execSelect.php");
require_once(dirname(__DIR__)."/database/exec/execInsert.php");
require_once(dirname(__DIR__)."/database/exec/execDelete.php");
require_once(dirname(__DIR__)."/database/exec/execUpdate.php");
require_once(dirname(__DIR__)."/database/exec/execverifyRegister.php");

class QueryExec extends Database{

    private $mysql;
    private $ini;
    private $select;
    private $insert;
    private $delete;
    private $update;
    private $register;

    public function __construct(){
        $this->select = new SelectDatabase();
        $this->insert = new InsertDatabase();
        $this->delete = new DeleteDatabase();
        $this->update = new UpdateDatabase();
        $this->register = new VerifyRegisterDatabase();

    }

    public function execQuery(string $query, string $param){

        if($param == "insert"){
            return $this->insert->insertExec($query);
        }
        
        if($param == "select"){
            return $this->select->selectExec($query);
        }

        if($param == "delete"){
            return $this->delete->deleteExec($query);                
        }

        if($param == "update"){
            return $this->update->updateExec($query);
        }

        if($param == "register"){
            return $this->register->registerExec($query);
        }
    }
}
