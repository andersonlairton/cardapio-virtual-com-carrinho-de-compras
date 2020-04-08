<?php
    echo 'pagina inicial';
    echo 'hello word'."<br>";

    $json_file = file_get_contents("https://rti-entregadochef-29cb9.firebaseio.com/123456.json");   
    $json_str = json_decode($json_file, true);
    $itens = $json_str['grupos'];

    foreach ( $itens as $e=>$value ) {
       // var_dump($e); 
        echo $value['cdGrupo']."<br>";
        echo $value['dsGrupo']."<br>";//descrição do grupo
       
        //varivel que pega os produtos
        //echo $e['produtos']."<br>";
        //var_dump(is_array($value['produtos']));//produtos pertencentes ao grupo
        foreach($value['produtos'] as $p=>$prod){//acessando os produtos de cada grupo
            //var_dump(is_array($prod['adicionais']));
            echo $prod['cdProduto']."<br>";
            echo $prod['dsObservacao']."<br>";
            echo $prod['dsProduto']."<br>";
            echo $prod['vlProduto']."<br>";
            foreach($prod['adicionais'] as $a=>$adic){
                echo $adic['cdAdicional']."<br>";
                echo $adic['dsAdicional']."<br>";
                echo $adic['vlAdicional']."<br>";
            }
            //echo $prod['cdProduto']."<br>";
        }
        /*
        var_dump(is_array($e['Complemento']));
        var_dump(is_array($e['Bebidas']));
        var_dump(is_array($e['Diversos']));
        //echo $e['produtos']['Complemento']."<br>";
        */
    }

