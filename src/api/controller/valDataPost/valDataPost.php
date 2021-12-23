<?php

class ValDataPost {

    public function verifyData($dados){
        
        $ret["status"] = true;
        $i = 0;

        if(!isset($dados->sku)){
            $ret["retorno"][$i]["Erro"] = "o campo SKU e obrigatorio";
            $ret["status"] = false;
            $i++;
        }
        
        if(!preg_match("/[A-Za-z]/", $dados->sku)){
            $ret["retorno"][$i]["Erro"] = "O campo SKU deve conter letras e numeros";
            $i++;
        }

        if(!preg_match("/[0-9]/", $dados->sku)){
            $ret["retorno"][$i]["Erro"] = "O campo SKU deve conter letras e numeros";
            $i++;
        }

        if(!isset($dados->productName)){
            $ret["retorno"][$i]["Erro"] = "O campo nome do produto e obrigatorio";
            $ret["status"] = false;
            $i++;
        }

        if(!isset($dados->price) && !is_float($dados->price)){
            $ret["retorno"][$i]["Erro"] = "O campo preco e obrigatorio e deveser um float";
            $ret["status"] = false;
            $i++;
        }

        if(!isset($dados->qtd)){
            $ret["retorno"][$i]["Erro"] = "O campo quantidade e obrigatorio";
            $ret["status"] = false;
            $i++;
        }

        if(!is_numeric($dados->qtd)){
            $ret["retorno"][$i]["Erro"] = "O campo quantidade deve conter apenas numeros";
            $ret["status"] = false;
            $i++;
        }

        if($dados->category != "Category 1" && $dados->category != "Category 2" &&
        $dados->category != "Category 3" && $dados->category != "Category 4"){
            $ret["retorno"][$i]["Erro"] = "O campo categoria deve ser 1, 2, 3 ou 4";
            $ret["status"] = false;
            $i++;
        }

        if(!isset($dados->descricao)){
            $ret["retorno"][$i]["Erro"] = "O campo descricao e obrigatorio";
            $ret["status"] = false;
            $i++;
        }

        if(strlen($dados->descricao > 250)){
            $ret["retorno"][$i]["Erro"] = "O campo descricao deve conter no maximo 250 caracteres";
            $ret["status"] = false;
            $i++;
        }
        
        if($ret["retorno"]){
            return $ret["retorno"];
        }
    }
}
