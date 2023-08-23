<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'header.php';
    ?>

<body>
    <?php
    session_start();
   
    /*if ( isset($_SESSION[ 'Aluno' ]) == 'Aluno' ) {
        header("Location: login.php");
        exit;
    } else {
        if ( isset($_SESSION[ 'Instrutor' ]) == 'Instrutor' ) {
            header("Location: login.php");
            exit;
        }
    }*/
    
    require_once __DIR__ . '../../static/controller/TreinoController.php';
    require_once __DIR__ . '../../static/model/Treino.php';
    $treinoController =  new TreinoController();
    $treino = new Treino();
    $acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0 );
    $id_Atividade_faz_Atividade = (isset($_POST["id_Atividade_faz_Atividade"])) ? $_POST["id_Atividade_faz_Atividade"] : ((isset($_GET["id_Atividade_faz_Atividade"])) ? $_GET["id_Atividade_faz_Atividade"] : 0 );
    if ($acao != "") {

        if ($acao == "excluir") {
            $treinoController->Deletar_Treino_Atividade();
            header("Location:ConsultarTreino.php");
        }
    }
    

    $pagina = (isset($_GET['p'])) ? $_GET['p'] : 1;
    $treinos = $treinoController->buscar_Treino_Atividade();
    $total = count($treinos);
    
    $registros_por_pagina = 2;
    $numPaginas = ceil($total / $registros_por_pagina);
    $inicio = ($registros_por_pagina * $pagina) - $registros_por_pagina;
  
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

                    <h1 class="h3 mb-3">Musculação:</h1>

                    <div class="container-fluid p-2">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="h3 mb-4"><strong>Dias e Horas dos Treinos Oferecidos</strong></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="btn-group btn-group-sm">
                                    <a href="CadastroTreino.php" class="btn btn-success"><i class="fa fa-plus">
                                        </i> Adicionar Treino</a>
                                </div>
                            </div>
                            <div class="col-md-4 p-2">
                                <form action="ConsultarTreino.php" method='post'>
                                    <div class="input-group">
                                        <input type="search" name="search" id="search"
                                            class="form-control form-control-lg" required
                                            placeholder="Buscar pela Descrição Atividade">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-lg btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">

                                        <h5 class="card-title mb-0">Atividade Musculação:</h5>
                                    </div>
                                    <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th>Nome Recepcionista</th>
                                                <th>Desc.Treino</th>
                                                <th>Data Inicio</th>
                                                <th>Data Final</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $treinos = $treinoController->ProcurarPaginacao_Treino_Atividade($inicio, $registros_por_pagina);
                                            $count = count($treinos);
                                            foreach ($treinos as $t) {
                                                date_default_timezone_set('America/Sao_Paulo');
                                                $data_inicio_semana= date("d/m/Y", strtotime($t->getdata_inicio_semana_faz_Atividade())); 
                                                $data_fim_semana= date("d/m/Y", strtotime($t->getdata_fim_semana_faz_Atividade())); 
                                                
                                           ?>

                                            <tr>
                                                <td><?php echo $t->getnm_Recepcionista(); ?></td>
                                                <td><?php echo $t->getdesc_faz_Atividade()?></td>
                                                <td><?php echo $data_inicio_semana;?></td>
                                                <td><?php echo $data_fim_semana;?></td>

                                                <td class="d-none d-md-table-cell">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="AlterarTreino.php?id_Atividade_faz_Atividade=<?php echo $t->getid_Atividade_faz_Atividade() ?>"
                                                            class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="javascript:if(confirm('deseja mesmo excluir o Treino <?php echo $t->getid_Atividade_faz_Atividade() ?>')) {location='ConsultarTreino.php?acao=excluir&id_Atividade_faz_Atividade=<?php echo $t->getid_Atividade_faz_Atividade()?>';} "
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div
                                class="d-flex aligns-items-center justify-content-center my-4 card text-center w-50 position-relative top-70 start-50 translate-middle">
                                <br>
                                <div class="align-self-center">
                                    <nav aria-label="...">
                                        <ul class="pagination justify-content-center">
                                            <?php
                                            //mostrando a paginacao

                                            $anterior = $pagina - 1;
                                            $proxima = $pagina + 1;

                                            // Página anterior
                                            if ($pagina > 1) {
                                                echo "<li class='page-item disabled'><a class='page-link' href='ConsultarTreino.php?p=$anterior' aria-label='Previous'> <span class='page-link'>Previous</span></a></li>";
                                            } else {
                                                echo "<li class='page-item'><a class='page-link' href='#' aria-label='Previous'><span aria-hidden='true'>Previous</span></a></li>";
                                            }


                                            // Páginas subsequentes
                                            for ($i = 1; $i < $numPaginas + 1; $i++) {
                                                echo "<li class='page-item'><a class='page-link' href='ConsultarTreino.php?p=$i'> " . $i . "  </a></li>";
                                            }


                                            // Página anterior
                                            if ($pagina < $numPaginas) {
                                                echo "<li class='page-item'><a class='page-link' href='ConsultarTreino.php?p=$proxima' aria-label='Próximo'><span aria-hidden='true'>Next</span></a></li>";
                                            } else {
                                                echo "<li class='page-item'><a class='page-link' href='#' aria-label='Próximo'><span aria-hidden='true'>Next</span></a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
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


</body>

</html>