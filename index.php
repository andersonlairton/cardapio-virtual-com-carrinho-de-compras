<html>

<head>
    <meta charset="UTF-8" />
    <title>Cardapio</title>
</head>
<?php
$json_file = file_get_contents("https://rti-entregadochef-29cb9.firebaseio.com/123456.json");
$json_str = json_decode($json_file, true);
$itens = $json_str['grupos'];
?>

<body>
    <?php
    foreach ($itens as $e => $value):
        echo $value['cdGrupo'] . "<br>";
    ?>
        <h3 name='dsGrupo'><?= $value['dsGrupo']; ?></h3>
    <div>
    <?php foreach ($value['produtos'] as $p => $prod): //acessando os produtos de cada grupo?>
            <div class="row">
                Cod Produto:<?=$prod['cdProduto']?><br>
                Nome:<?=$prod['dsObservacao']?><br>
                Descrição:<?=$prod['dsProduto']?><br>
                R$ <?=$prod['vlProduto']?><br>
            </div>
            <?php foreach ($prod['adicionais'] as $a => $adic) {
                /*
                echo $adic['cdAdicional'] . "<br>";
                echo $adic['dsAdicional'] . "<br>";
                echo $adic['vlAdicional'] . "<br>";
                */
            }
        endforeach;?>
        </div>
    <?php endforeach; ?>
</body>
</html>