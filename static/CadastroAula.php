<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'header.php';
    ?>

<body>
    <div class="wrapper">
        <?php include 'menu.php'; ?>

        <div class="main">
            <?php 
                include 'topo.php'; 
            ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Atividades:</h1>


                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>Cadastro de Atividades</h5>
                            </div>
                            <div class="card-body">
                                <form action="cadastroCliente.php" enctype='multipart/form-data' method='post'>
                                    <div class="mb-2">
                                        <input type="hidden" id="aluno_id_aluno" name="aluno_id_aluno">
                                    </div>

                                    <div class="mb-2">
                                        <input type="hidden" id="musculacao_id_musculacao"
                                            name="musculacao_id_musculacao">
                                    </div>
                                    <div class="mb-2">
                                        <input type="hidden" id="Recepcionista_id_Recepcionista"
                                            name="Recepcionista_id_Recepcionista">
                                    </div>
                                    <div class="mb-2">
                                        <input type="hidden" id="INSTRUTOR_id_instrutor" name="INSTRUTOR_id_instrutor">
                                    </div>

                                    <div class="mb-3">

                                        <div class="mb-3">
                                            <label for="Nome" class="form-label">Descrição Treino</label>
                                            <input type="text" class="form-control" id="vlr_mensal_Musculacao"
                                                name='vlr_mensal_Musculacao' required autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Nome" class="form-label">Desconto Valor Mensal
                                                Musculação</label>
                                            <input type="text" class="form-control" id="desco_mensal_Musculacao"
                                                name='desco_mensal_Musculacao' required autocomplete="off">
                                        </div>
                                        <div class="row">
                                            <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                                <div class="mb-3">

                                                    </label>
                                                    <input type="date" class="form-control"
                                                        id="data_inicio_semana_Treino" name='data_inicio_semana_Treino'
                                                        required autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                                <div class="mb-3">

                                                    </label>
                                                    <?php
                                                     date_default_timezone_set('America/Sao_Paulo');
                                                    $date = date('H:i:s');
                                                    ?>
                                                    <input type="text" class="form-control"
                                                        id="hora_inicio_semana_Treino" name='hora_inicio_semana_Treino'
                                                        required autocomplete="off" readonly value="<?=$date;?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
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