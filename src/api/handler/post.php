<?php

require_once("../controller/controllerPost.php");

class Post extends ControllerPost{

    public function postCadastro($obj){

        return $this->gravaDados($obj);
    }
}
