<?php

class cadDel{

    public function cadDelete(string $param){

        try {
            
            return "DELETE FROM ". $param;
            
        } catch (\Exception $e) {
            throw("Erro :".__FUNCTION__." ". $e->getMessage());
        }

    }
}
