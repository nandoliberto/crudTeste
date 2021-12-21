<?php

require_once("../controller/controllerPost.php");

class Post{

    public function postCadastro($obj){
        
        $post = new ControllerPost();

        return $post->gravaDados($obj);
    }

}