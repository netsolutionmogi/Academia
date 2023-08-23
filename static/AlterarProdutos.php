<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'header.php';
    ?>

<body>
    <?php
session_start();
?>
    <div class="wrapper">
        <?php 
        
        if ( isset($_SESSION[ 'Aluno' ]) == 'Aluno' ) {
                            
            include 'menuAluno.php';
        } else {
            if ( isset($_SESSION[ 'Instrutor' ]) == 'Instrutor' ) {
                include 'menuInstrutor.php';
            }else{
                if ( isset($_SESSION[ 'Recepcionista' ]) == 'Recepcionista' ) {
                    include 'menuRecepcionista.php';
                }  
            }
        }

        ?>

        <div class="main">
            <?php 
                include 'topo.php'; 
            ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Produtos:</h1>
                    <?php
                      require_once __DIR__ . '../../static/controller/ProdutosController.php';
                     //require_once '../static/controller/AlunosController.php';
                      $produtoController =  new ProdutoController();
                      $acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0 );
                      $id_Produto = (isset($_POST["id_Produto"])) ? $_POST["id_Produto"] : ((isset($_GET["id_Produto"])) ? $_GET["id_Produto"] : 0 );
                      $produto = $produtoController->BuscarProdutoPorCodigo();
                                 
                     ?>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>Alterando Produtos:</h5>
                            </div>
                            <div class="card-body">
                                <form action="AlterandoProdutos.php?id_Produto=<?php echo $produto->getid_Produto();?>"
                                    method='post'>
                                    <div class="mb-2">
                                        <label for="id_Produto" class="form-label">Id Produto: </label>
                                        <input type="text" class="form-control" name="id_Produto"
                                            value="<?php echo $produto->getid_Produto();?>" required readonly>

                                    </div>
                                    <div class="mb-3">
                                        <label for="Nome" class="form-label">Id_Aluno</label>
                                        <input type="text" class="form-control" id="fk_ALUNO_id_Aluno"
                                            value="<?php echo isset($_SESSION[ 'id_Aluno' ])?>" name='fk_ALUNO_id_Aluno'
                                            readonly autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Nome" class="form-label">Nome Produto</label>
                                        <input type="text" class="form-control" id="nome" name='nome' required val
                                            value="<?php echo $produto->getnm_Produto();?>" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="descricao" class="form-label">Descrição Produto </label>
                                        <input type="text" class="form-control" id="desc_produto" name='desc_produto'
                                            value="<?php echo $produto->getdesc_Produto();?>" required
                                            autocomplete="off">
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-5">
                                            <label for="qtdeProduto" class="form-label">Qtde Produto:</label>
                                            <input type="text" class="form-control" name='qtde_Produto'
                                                value="<?php echo $produto->getqtde_Produto();?>" id="qtde_Produto"
                                                required autocomplete="off">
                                        </div>


                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-5">
                                            <label for="PrecoVenda" class="form-label">Valor Unitário
                                                Produto:</label>
                                            <input type="text" class="form-control" name='vlr_unit_Produto'
                                                value="<?php echo $produto->getvlr_unit_Produto();?>"
                                                id="vlr_unit_Produto" required autocomplete="off">
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-5">
                                            <label for="vlr_total_Produto" class="form-label">Valor Total
                                                Produto:</label>
                                            <input type="text" class="form-control" name='vlr_total_Produto'
                                                value="<?php echo $produto->getvlr_total_Produto();?>"
                                                id="vlr_total_Produto" required autocomplete="off">
                                        </div>


                                    </div>
                                    <br>

                                    <div style="text-align: right;">
                                        <input type="hidden" name="acao" value="Alterar" />
                                        <button type="submit" name="BtnAlterar" class="btn btn-primary">Alterar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </main>



            <footer class="footer">
                <?php include 'footer.php' ?>
            </footer>
        </div>
    </div>

    <script src="js/app.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script type="text/javascript">
    $("#telefone, #celular").mask("(00) 00000-0000"); //000 000 0000 eua
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('#cep').mask('00000-000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {
        reverse: true
    });
    $('.cnpj').mask('00.000.000/0000-00', {
        reverse: true
    });
    $('.money').mask('000.000.000.000.000,00', {
        reverse: true
    });
    $('.money2').mask("#.##0,00", {
        reverse: true
    });
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/,
                optional: true
            }
        }
    });
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {
        reverse: true
    });
    $('.clear-if-not-match').mask("00/00/0000", {
        clearIfNotMatch: true
    });
    $('.placeholder').mask("00/00/0000", {
        placeholder: "__/__/____"
    });
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", {
        selectOnFocus: true
    });
    </script>


    <script type="text/javascript">
    $("#cpfcnpj").keydown(function() {
        try {
            $("#cpfcnpj").unmask();
        } catch (e) {}

        var tamanho = $("#cpfcnpj").val().length;

        if (tamanho < 11) {
            $("#cpfcnpj").mask("999.999.999-99");
        } else {
            $("#cpfcnpj").mask("99.999.999/9999-99");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function() {
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });
    </script>


</body>

</html>