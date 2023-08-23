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

                    <h1 class="h3 mb-3">Alunos:</h1>
                    <?php
                    require_once __DIR__ . '../../static/controller/AlunosController.php';
                     //require_once '../static/controller/AlunosController.php';
                    
                     if(isset($_POST['BtnRegistrar'])){
                        
                        $acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0 );
                        
                        if ($acao != "") {
                        
                            if ($acao == "incluir") {
                            try {
                                    $aluno =  new ALunosController();
                                    $aluno->gravarAlunos();
                                    //window.location.href = './ConsultarAlunos.php';
                                    echo "<script>
                                                alert('Aluno cadastrado com sucesso!');

                                            </script>";
                                            
                                } catch ( Exception $e ) {
                                        print 'Erro ao Inserir Aluno <br>' . $e . '<br>';
                                    }
                                            
                                }
                        }
                    }
                     ?>

                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>Cadastro de Alunos</h5>
                            </div>
                            <div class="card-body">

                                <form action="CadastroAlunos.php" enctype='multipart/form-data' method='post'
                                    method='post'>
                                    <div class="mb-3">
                                        <label for="login" class="form-label">Login do Aluno: </label>
                                        <input type="text" class="form-control" name="login" required
                                            placeholder="login">

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
                                        <label for="nome" class="form-label">Nome do Aluno: </label>
                                        <input type="text" class="form-control" name="nm_Aluno" required
                                            placeholder="Nome do Aluno">

                                    </div>
                                    <div class="mb-3">
                                        <label for="sobrenome" class="form-label">Sobrenome: </label>
                                        <input type="text" class="form-control" name="sbnm_Aluno" required
                                            placeholder="Sobrenome do Aluno">

                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="data_nasc" class="form-label">Data Nasc: </label>
                                            <input type="text" class="form-control" id="data_nasc_Aluno"
                                                name='data_nasc_Aluno' maxlength="14" required
                                                placeholder="Data Nascimento">
                                        </div>
                                        <div class="col-9 col-sm-9 col-md-9 col-lg-9">
                                            <div class="mb-3">
                                                <label for="sexo" class="form-label"> Sexo: </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sexo"
                                                        value="Masculino" id="radio-sexo-masculino">
                                                    <label class="form-check-label" for="radio-sexo-masculino">
                                                        Masculino
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sexo"
                                                        value="Feminino" id="radio-sexo-feminino">
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
                                            <input type="text" class="form-control" id="rg" name='rg' maxlength="10"
                                                required autocomplete="off">
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                            <div class="mb-3">
                                                <label for="Telefone" class="form-label">Telefone</label>
                                                <input type="text" class="form-control" name='tel_aluno' id="tel_aluno"
                                                    required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail:</label>
                                        <input type="text" class="form-control" name="email_aluno" required
                                            placeholder="E-mail do Aluno">

                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-7 col-sm-7 col-md-7 col-lg-7">
                                            <label for="formFile" class="form-label">Logo/Imagem Pessoa</label>
                                            <input class="form-control" type="file" name="img" id="img" required>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                                            <img id="preview-image" style="width: 220px; height: 150px;"><br><br>
                                        </div>
                                    </div>
                                    <div style="text-align: right;">
                                        <input type="hidden" name="acao" value="incluir" />
                                        <button type="submit" name="BtnRegistrar"
                                            class="btn btn-primary">Enviar</button>
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

    <script src="js/app.js"></script>
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
    $("#tel_aluno, #celular").mask("(00) 00000-0000"); //000 000 0000 eua
    $('#data_nasc_Aluno').mask('00/00/0000');
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