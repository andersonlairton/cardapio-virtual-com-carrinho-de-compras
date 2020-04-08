<?php
    echo 'pagina inicial';
    echo 'hello word'."<br>";

    $json_file = file_get_contents("https://rti-entregadochef-29cb9.firebaseio.com/123456.json");   
    $json_str = json_decode($json_file, true);
    $itens = $json_str['grupos'];

    foreach ( $itens as $e ) { 
        echo $e['cdGrupo']."<br>";
        echo $e['dsGrupo']."<br>";
        //echo $e['produtos']."<br>";
        var_dump(is_array($e['produtos']));
        //echo $e['produtos']['Complemento']."<br>";
    }

