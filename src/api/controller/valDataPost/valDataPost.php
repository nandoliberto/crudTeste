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
        if(!preg_match('/[0-9]/',$dados->sku) && !preg_match('/[a-zA-Z]/',$dados->sku)){
            $ret["retorno"][$i]["Erro"] = "O codigo deve conter letras e numeros";
            $ret["status"] = false;
            $i++;
        }

        if(!isset($dados->productName)){
            $ret["retorno"][$i]["Erro"] = "O campo nome do produto e obrigatorio";
            $ret["status"] = false;
            $i++;
        }

        if(!isset($dados->price)){
            $ret["retorno"][$i]["Erro"] = "O campo preco e obrigatorio";
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

        if($dados->categoria == "Category 1" && $dados->categoria == "Category 2" &&
        $dados->categoria == "Category 3" && $dados->categoria == "Category 4"){
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
