<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gerenciador Academia &amp; Dashboard para freelancers">
    <meta name="author" content="Alexandre Seixas">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <script src="https://kit.fontawesome.com/1f76937ee1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <title>Gerenciador Academia para freelancers</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="col-sm-8 col-md-8 col-lg-8 d-flex mx-auto align-items-center justify-content-center">
            <div class="d-flex mx-auto align-items-center justify-content-center">

                <div class="card">
                    <?php
                    require_once __DIR__ . '../../static/controller/RecepcionistaController.php';
                     //require_once '../static/controller/AlunosController.php';
                    
                     if(isset($_POST['BtnRegistrar'])){
                        
                        $acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0 );
                        
                        if ($acao != "") {
                        
                            if ($acao == "incluir") {
                            try {
                                    $recepcionista =  new RecepcionistaController();
                                    $recepcionista->gravarRecepcionista();

                                    echo "<script>
                                                alert('Recepcionista cadastrada(o) com sucesso!');
                                                window.location.href = './login.php';
                                            </script>";
                                            
                                } catch ( Exception $e ) {
                                        print 'Erro ao Inserir Recepcionista <br>' . $e . '<br>';
                                    }
                                            
                                }
                        }
                    }
                     ?>

                    <div class="card-body" style='margin-top:20px; padding: 20px;'>
                        <h5 class="card-title mb-3">Registrar Recepcionista:</h5>
                        <form action="Registrar_Recepcionista.php" enctype='multipart/form-data' method='post'
                            id="login-form">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="login" required placeholder="login">

                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="senha" id="senha" required
                                    placeholder="Senha">
                                <div class="input-group-append">
                                    <div class="input-group-text">

                                    </div>
                                    <button class="button btn sm btn-light" type="button"
                                        onclick="mostrarSenha()">Mostrar
                                        Senha</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="nm_Recepcionista" name="nm_Recepcionista"
                                    required placeholder="Nome da Recepcionista">

                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="sbnm_Recepcionista"
                                    name="sbnm_Recepcionista" required placeholder="Sobrenome da Recepcionista">

                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" class="form-control" id="data_nasc_Recepcionista"
                                        name='data_nasc_Recepcionista' maxlength="8" required
                                        placeholder="Data Nascimento" autocomplete="off">
                                </div>
                                <div class="col-9 col-sm-9 col-md-9 col-lg-9">
                                    <div class="mb-3">
                                        <label for="sexo" class="form-label"> Sexo: </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" value="Masculino"
                                                id="radio-sexo-masculino">
                                            <label class="form-check-label" for="radio-sexo-masculino">
                                                Masculino
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" value="Feminino"
                                                id="radio-sexo-feminino">
                                            <label class="form-check-label" for="radio-sexo-feminino">
                                                Feminino
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                    <label for="Rg" class="form-label">Rg</label>
                                    <input type="text" class="form-control" id="rg" name='rg' maxlength="10" required
                                        autocomplete="off">
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                    <div class="mb-3">
                                        <label for="Telefone" class="form-label">Telefone</label>
                                        <input type="text" class="form-control" name='tel_Recepcionista'
                                            id="tel_Recepcionista" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                    <div class="mb-3">
                                        <label for="Cpf" class="form-label">Cpf</label>
                                        <input type="text" class="form-control" name='cpf' id="cpf" required
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                    <label for="cep" class="form-label">Cep</label>
                                    <input type="text" class="form-control" id="cep" name='cep' maxlength="12" required
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-9 col-sm-9 col-md-9 col-lg-9">
                                    <label for="logradouro" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="logradouro" name='logradouro'
                                        maxlength="12" required autocomplete="off">
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                                    <label for="numero" class="form-label">N°</label>
                                    <input type="text" class="form-control" id="num_Recepcionista"
                                        name='num_Recepcionista' maxlength="12" required autocomplete="off">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                    <label for="complemento" class="form-label">Complemento</label>
                                    <input type="text" class="form-control" id="compl_Recepcionista"
                                        name='compl_Recepcionista' maxlength="12" required autocomplete="off">
                                </div>
                                <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name='bairro' maxlength="12"
                                        required autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cidade" class="form-label">Cidade:</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required
                                    placeholder="Cidade">

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="text" class="form-control" name="email_Recepcionista"
                                    id="email_Recepcionista" required placeholder="E-mail da Recepcionista">

                            </div>

                            <div class="row mb-3">
                                <div class="col-7 col-sm-7 col-md-7 col-lg-7">
                                    <label for="formFile" class="form-label">Logo/Imagem Pessoa</label>
                                    <input class="form-control" type="file" name="img" id="img">
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                    <img id="preview-image" style="width: 200px; height: 150px;"><br><br>
                                </div>
                            </div>
                            <!--<div class="mb-3">
                                        <label for="formFile" class="form-label">Logo/Imagem Pessoa</label>
                                        <input class="form-control" type="file" name='foto' id="formFile">
                                    </div>-->
                            <br>

                            <div style="text-align: right;">
                                <input type="hidden" name="acao" value="incluir" />
                                <button type="submit" name="BtnRegistrar" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->

    <script>
    function mostrarSenha() {
        var tipo = document.getElementById("senha");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }
    </script>
    <script>
    const input = document.querySelector('#img');
    input.addEventListener('change', function(e) {
        const tgt = e.target || window.event.srcElement;

        const files = tgt.files;
        const fr = new FileReader();

        fr.onload = function() {
            document.querySelector('#preview-image').src = fr.result;
        }

        fr.readAsDataURL(files[0]);
    });
    </script>

    <script>
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");

        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#logradouro").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");


                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#logradouro").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);

                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script type="text/javascript">
    $("#tel_Recepcionista, #celular").mask("(00) 00000-0000"); //000 000 0000 eua
    $('#data_nasc_Recepcionista').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('#cep').mask('00000-000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('#cpf').mask('000.000.000-00', {
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