<?php

require_once("/var/www/html/api/utils/logs.php");

class ValDataPut {

    private $logs;

    public function __construct(){
        $this->logs = new Logs();
    }

    public function verifyData($dados){

        $this->logs->writeLog("[".date("Y-m-d H:i:s")."] "."Validando campos");
        
        $i = 0;

        if(!isset($dados_id) && !is_numeric($dados->id)){
            $ret["retorno"][$i]["Erro"] = "O campo ID é obrigatorio e deve ser numerico.";
        }

        if(isset($dados->sku) && $dados->sku == ""){
            $ret["retorno"][$i]["Erro"] = "O campo SKU e obrigatorio";
            $i++;
        }

        if(isset($dados->sku) && $dados->sku != ""){
            if(!preg_match("/[A-Za-z]/", $dados->sku)){
                $ret["retorno"][$i]["Erro"] = "O campo SKU deve conter letras e numeros";
                $i++;
            }
    
            if(!preg_match("/[0-9]/", $dados->sku)){
                $ret["retorno"][$i]["Erro"] = "O campo SKU deve conter letras e numeros";
                $i++;
            }
        }

    
        if(isset($dados->productName) && $dados->productName == ""){
            $ret["retorno"][$i]["Erro"] = "O campo nome do produto e obrigatorio";
            $i++;
        }

        if(isset($dados->price) && !is_float($dados->price)){
            $ret["retorno"][$i]["Erro"] = "O campo preco e obrigatorio e deve ser um float";
            $i++;
        }
        
        if(isset($dados->qtd) && !is_numeric($dados->qtd)){
            $ret["retorno"][$i]["Erro"] = "O campo quantidade e obrigatorio e deve ser numerico";
            $i++;
        }
        
        if(isset($dados->category)){
           
            if($dados->category != "Category 1" && $dados->category != "Category 2" &&
            $dados->category != "Category 3" && $dados->category != "Category 4"){
                $ret["retorno"][$i]["Erro"] = "O campo categoria deve ser  preenchido como Category 1, 2, 3 ou 4";
                $i++;
            }
        }
        
        if(isset($dados->descricao) && $dados->descricao == ""){
            $ret["retorno"][$i]["Erro"] = "O campo descricao e obrigatorio";
            $i++;

            if(strlen($dados->descricao > 250)){
                $ret["retorno"][$i]["Erro"] = "O campo descricao deve conter no maximo 250 caracteres";
                $i++;
            }
        }

        if($ret["retorno"]){

            for ($i=0; $i < count($ret["retorno"]); $i++) { 
                $this->logs->writeLog("[".date("Y-m-d H:i:s")."] "."Erro localizado = ".json_encode($ret["retorno"][$i]));
            }

            return $ret["retorno"];
        }
    }
}
