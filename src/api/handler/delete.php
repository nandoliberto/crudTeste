<?php

require_once("../controller/controllerDelete.php");

class Delete extends ControllerDelete{

    public function deleteCadastro($param){

        return $this->delCadatro($param);

    }

}
