<?php

include_once("../utils/UtilsRestModel.php");
require_once("../database/database.php");
require_once("colummInsert.php");
require_once("del.php");
require_once("from.php");
require_once("groupby.php");
require_once("inner.php");
require_once("insert.php");
require_once("limit.php");
require_once("orderby.php");
require_once("select.php");
require_once("set.php");
require_once("update.php");
require_once("valueInsert.php");
require_once("where.php");

class Restmodel extends UtilsRestModel{

    private $select;
    private $_select;
    private $from;
    private $_from;
    private $where;
    private $_where;
    private $inner;
    private $_inner;
    private $limit;
    private $_limit;
    private $orderby;
    private $_orderby;
    private $groupby;
    private $_groupby;
    private $delete;
    private $_delete;
    private $update;
    private $_update;
    private $insert;
    private $_insert;
    private $set;
    private $_set;
    private $columm;
    private $_columm;
    private $value;
    private $_value;
    public $db;

    public function __construct(){

        $this->value = new ValiueInsert();
        $this->columm = new ColummInsert();
        $this->set = new Set();
        $this->insert = new Insert();
        $this->update = new Update();
        $this->groupby = new GroupBy();
        $this->orderby = new OrderBy();
        $this->limit = new Limit();
        $this->inner = new Inner();
        $this->where = new Where();
        $this->from = new From();
        $this->select = new Select();
        $this->delete = new cadDel();
        
    }

    public function insert($param){
        
        $this->verifyString($param);
        
        $this->_insert = $this->insert->_insert($param);
        
    }

    public function colummInsert($param){
        
        $this->verifyString($param);
        
        $this->_columm = $this->columm->_colummInsert($param);
        
    }

    public function valueInsert($param){
        
        $this->verifyString($param);
        
        $this->_value = $this->value->_valueInsert($param);
        
    }

    public function delete($param){
        
        $this->verifyString($param);
        
        $this->_delete = $this->delete->cadDelete($param);
        
    }

    public function from($param){
        $this->verifyString($param);
        $this->_from = $this->from->_from($param);
    }

    public function update($param){
        $this->verifyString($param);
        $this->_update = $this->update->_update($param);
    }

    public function groupby($param){
        $this->verifyString($param);
        $this->_groupby = $this->groupby->_groupBy($param);
    }

    public function orderby($param){
        $this->verifyString($param);
        $this->_orderby = $this->orderby->_orderBy($param);
    }

    public function limit($param){
        $this->verifyString($param);
        $this->_limit = $this->limit->_limit($param);
    }

    public function inner($param){
        $this->_inner = $this->inner->_inner($param);
    }

    public function where($param){
        $this->_where = $this->where->_where($param);
    }

    public function select($param){
        $this->verifyString($param);
        $this->_select = $this->select->_select($param);
    }

    public function exec(){

        $this->db = new Database();
        $sql="";
        $ret;
        if(isset($this->_select)){

            $sql = $this->_select.$this->_from;

            if(isset($this->_inner)){
                $sql .= $this->_inner;
            }

            $sql .= $this->_where;
            
            if(isset($this->_orderby)){
                $sql .= $this->_orderby;
            }

            if(isset($this->_groupby)){
                $sql .= $this->_groupby;
            }

            if(isset($this->_limit)){
                $sql .= $this->_limit;
            }
            
            $ret = $this->db->execQuery($sql, "select");
        }

        if(isset($this->_update)){
            $sql = $this->_update.$this->_set.$this->_where;
            $ret = $this->db->execQuery($sql, "update");
        }

        if(isset($this->_delete)){
            $sql = $this->_delete.$this->_where;
            $ret = $this->db->execQuery($sql, "delete");
        }

        if(isset($this->_insert)){
            $sql = $this->_insert.$this->_columm.$this->_value;
            $ret = $this->db->execQuery($sql,"insert");
            
        }
        
        return $ret;
    }
}