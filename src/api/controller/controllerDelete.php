<?php

require_once("../model/cadastroModelDelete.php");

class ControllerDelete extends CadastroDeleteModel{

    public function delCadatro($id){

        return $this->delCadastroModel($id);

    }

}