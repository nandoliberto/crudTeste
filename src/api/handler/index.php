<?php

include_once("../controller/controllerPost.php");
include_once("../utils/UtilsAuth.php");
require_once("post.php");
require_once("get.php");
require_once("delete.php");

header("Access-Control-Allow-Origin:*");
header('Cache-Control: no-cache,must-revalidate');
header("Content-Type: Application/Json");
header("HTTP/1.1 200 ok");

class CadastroHandler{

    private $utils;
    private $obj;
    private $metodo;
    private $post;
    private $get;

    public function __construct($metodo,$obj){
        
        $this->utils = new UtilsAuth();
        $this->obj = $obj;
        $this->metodo = $metodo;
        $this->post = new Post();
        $this->get = new Get();
        $this->delete = new Delete();

    }

    
    public function change(){

        $header = $this->utils->valHeaders(getallheaders());

        if($header){
            return $header;
        }
        
        switch ($this->metodo) {
            case "POST":
                return $this->post->postCadastro($this->obj);

            case "GET":
                $param = $this->utils->getQueryParams($_GET);
                return $this->get->getCadastro($param);

            case 'DELETE':
                $param = $this->utils->getQueryParams($_GET);
                return $this->delete->deleteCadastro($param[1]);

            default:
                return "metodo invalido";

        }
    }
}
$class = new CadastroHandler($_SERVER['REQUEST_METHOD'], json_decode(file_get_contents("php://input")));
$ret = $class->change();
echo json_encode($ret);
