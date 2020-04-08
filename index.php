<html>

<head>
    <meta charset="UTF-8" />
    <title>Cardapio</title>
    <!-- pegando o css do bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php
    $json_file = file_get_contents("https://rti-entregadochef-29cb9.firebaseio.com/123456.json");
    $json_str = json_decode($json_file, true);
    $itens = $json_str['grupos'];
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function camposModal(valores){
            console.log(valores);
        }
    </script>
</head>

<body>
    <?php
    foreach ($itens as $e => $value) :
        echo $value['cdGrupo'] . "<br>";
    ?>
        <h3 name='dsGrupo'><?= $value['dsGrupo']; ?></h3>
        <div class='row'>
            <?php foreach ($value['produtos'] as $p => $prod) : //acessando os produtos de cada grupo
            ?>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $prod['dsProduto'] ?></h5>
                            <p class="card-text"><?= $prod['dsObservacao'] ?></p>
                            <p class="card-text">R$ <?= $prod['vlProduto'] ?></p>
                            <!-- inserindo o moda -->

                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo" onclick="camposModal('<?php echo $prod['dsProduto']?>');">
                                Abrir modal de demonstração<?= $prod['dsProduto'] ?>
                            </button>

                            <!-- Modal 
                            como ele nao realiza nenhuma ação,talvez seja mais facil fazer o modal com javascript,usando get element by id
                        -->

                        </div>
                    </div>
                </div>
                <br>
            <?php foreach ($prod['adicionais'] as $a => $adic) {
                    /*
                echo $adic['cdAdicional'] . "<br>";
                echo $adic['dsAdicional'] . "<br>";
                echo $adic['vlAdicional'] . "<br>";
                */
                }
            endforeach; ?>
        </div>
    <?php endforeach; ?>

    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>