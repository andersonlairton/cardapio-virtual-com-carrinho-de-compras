<html>

<head>
    <meta charset="UTF-8" />
    <title>Cardapio</title>
    <!-- pegando o css do bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php
    $json_file = file_get_contents("dados.json");
    $json_str = json_decode($json_file, true);
    $itens = $json_str['grupos'];
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function camposModal(descricao, ingrediente, valor, adicionais, grupo, produto) {

            console.log(grupo);
            console.log(produto);

            document.getElementById("nomeprod").innerHTML = descricao;

            if (ingrediente == "null")
                document.getElementById("ingredientes").innerHTML = "";
            else
                document.getElementById("ingredientes").innerHTML = ingrediente;


            document.getElementById("valor").innerHTML = valor;
            document.getElementById("total").innerHTML = valor;
        }

        function calcTotal(valAdicional) {
            //document.getElementById("adc1").onclick = function() {
                if(!valAdicional)
                    valAdicional=0;

                var total = parseFloat(document.getElementById("total").innerHTML);
                var adicional = parseFloat(document.getElementById("valAdc").innerHTML);
                console.log(valAdicional);
                total = total + valAdicional;
                document.getElementById("total").innerHTML = total;
                console.log(total);


          //  };
        }
    </script>
</head>

<body>
    <?php
    // var_dump($itens[0]['produtos'][0]['adicionais']);
    foreach ($itens as $e => $value) :
        var_dump($e);
        echo $value['cdGrupo'] . "<br>";
    ?>
        <h3 name='dsGrupo'><?= $value['dsGrupo']; ?></h3>
        <div class='row'>
            <?php foreach ($value['produtos'] as $p => $prod) : //acessando os produtos de cada grupo
                // var_dump($value['produtos'][0]['adicionais']);
            ?>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $prod['dsProduto'] ?></h5>
                            <p class="card-text"><?= $prod['dsObservacao'] ?></p>
                            <p class="card-text">R$ <?= $prod['vlProduto'] ?></p>
                            <!-- inserindo o moda -->
                            <?php
                            $descricao = $prod['dsObservacao'];
                            $adicionais = [];
                            if (strlen($descricao) == 2 || empty($descricao)) {
                                $descricao = "null";
                            }
                            var_dump($e);
                            var_dump($p);
                            ?>
                            <!-- Botão para acionar modal -->

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo" onclick="camposModal(
                            '<?= $prod['dsProduto'] ?>',
                            '<?= $descricao ?>',
                            '<?= $prod['vlProduto'] ?>',
                            '<?= $e ?>',
                            '<?= $p ?>');">
                                Abrir modal de demonstração<?= $prod['dsProduto'] ?>
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="nomeprod" value=""></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label id="ingredientes"></label><br>
                                <label id="valor"></label>
                            </div>
                            <div class="adicionais">
                                <?php //var_dump($itens[0]['produtos'][0]['adicionais']);
                                foreach ($prod['adicionais'] as $a => $adic) { ?>
                                    <table>
                                        <tr>
                                            <td><?= $adic['dsAdicional'] ?></td>
                                            <td>R$</td>
                                            <td id="valAdc"><?= $adic['vlAdicional'] ?></td>
                                            <td id='adc1'><button onclick="calcTotal(<?(float)$adic['vlAdicional']?>)"><input type="checkbox" id='adc' value="on" /></button></td>
                                        </tr>
                                    </table>
                                <?php
                                }
                                ?>
                                Total:R$<label id="total"></label>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary">Salvar mudanças</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</body>

</html>