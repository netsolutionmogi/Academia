<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'header.php';
    ?>

<body>
    <?php
    session_start();
    require_once __DIR__ . '../../static/controller/InstrutorController.php';
                                                
    $instrutorController = new InstrutorController();
    $instrutor = new Instrutor();
    $acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0 );
    $id_Instrutor = (isset($_POST["id_Instrutor"])) ? $_POST["id_Instrutor"] : ((isset($_GET["id_Instrutor"])) ? $_GET["id_Instrutor"] : 0 );
    if ($acao != "") {

        if ($acao == "excluir") {
            $instrutorController->Deletar_Instrutor();
            header("Location:ConsultarInstrutor.php");
        }
    }

    $pagina = (isset($_GET['p'])) ? $_GET['p'] : 1;
    $instrutorBean = $instrutorController->buscar_Instrutor();
    $total = count($instrutorBean);

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

                    <h1 class="h3 mb-3">Professor:</h1>

                    <div class="container-fluid p-2">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="h3 mb-4"><strong>Professores Cadastrados</strong></h1>
                            </div>
                            <div class="col-md-4">
                                <h1 class="h3 mb-4"><strong>Logado:
                                        <?php
                        if ( isset($_SESSION[ 'Aluno' ]) == 'Aluno' ) {
                            
                            echo $_SESSION[ 'Aluno' ];
                        } else {
                            if ( isset($_SESSION[ 'Instrutor' ]) == 'Instrutor' ) {
                                echo $_SESSION[ 'Instrutor' ];
                            }else{
                                if ( isset($_SESSION[ 'Recepcionista' ]) == 'Recepcionista' ) {
                                    echo $_SESSION[ 'Recepcionista' ];
                                }  
                            }
                        }
                        ?>

                                    </strong></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <?php 
        
                            if ( isset($_SESSION[ 'Aluno' ]) == 'Aluno' ) {
                            
                            } else {
                                if ( isset($_SESSION[ 'Instrutor' ]) == 'Instrutor' ) {
                                
                                }else{
                                    if ( isset($_SESSION[ 'Recepcionista' ]) == 'Recepcionista' ) {
                                    ?>
                                <div class="btn-group btn-group-sm">
                                    <a href="CadastroInstrutor.php" class="btn btn-success"><i class="fa fa-plus">
                                        </i> Adicionar Professores</a>
                                </div>
                                <?php
                                    }  
                                }
                            }

                            ?>

                            </div>
                            <div class="col-md-4 p-2">
                                <form action="ConsultarInstrutor.php" method='post'>
                                    <div class="input-group">
                                        <input type="search" name="search" id="search"
                                            class="form-control form-control-lg" required
                                            placeholder="Buscar pelo Nome">
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

                                        <h5 class="card-title mb-0">Professor:</h5>
                                    </div>
                                    <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th class="d-none d-xl-table-cell">E-mail</th>
                                                <th class="d-none d-xl-table-cell">Telefone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $instrutorBean = $instrutorController->Buscar_paginacao_Instrutor($inicio, $registros_por_pagina);
                                            $count = count($instrutorBean);
                                            foreach ($instrutorBean as $professor) {
                                            ?>
                                            <tr>
                                                <td><?php echo $professor->getnmInstrutor(); ?></td>
                                                <td class="d-none d-xl-table-cell">
                                                    <?php echo $professor->getemail_Instrutor();?></td>
                                                <td class="d-none d-xl-table-cell">
                                                    <?php echo $professor->gettel_Instrutor();?></td>
                                                <td class="d-none d-md-table-cell">

                                                    <?php 
        
                                            if ( isset($_SESSION[ 'Aluno' ]) == 'Aluno' ) {
                                            
                                            } else {
                                                if ( isset($_SESSION[ 'Instrutor' ]) == 'Instrutor' ) {
                                                
                                                }else{
                                                    if ( isset($_SESSION[ 'Recepcionista' ]) == 'Recepcionista' ) {
                                                    ?>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="AlterarInstrutor.php?id_Instrutor=<?php echo $professor->getid_Instrutor(); ?>"
                                                            class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="javascript:if(confirm('deseja mesmo excluir o Aluno <?php echo $professor->getid_Instrutor() ?>')) {location='ConsultarInstrutor.php?acao=excluir&id_Instrutor=<?php echo $professor->getid_Instrutor()?>';} "
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                    <?php
                                                    }  
                                                }
                                            }

                                            ?>
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
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <?php
                                            //mostrando a paginacao

                                            $anterior = $pagina - 1;
                                            $proxima = $pagina + 1;

                                            // Página anterior
                                            if ($pagina > 1) {
                                                echo "<li class='page-item disabled'><a class='page-link' href='ConsultarInstrutor.php?p=$anterior' aria-label='Previous'> <span class='page-link'>Previous</span></a></li>";
                                            } else {
                                                echo "<li class='page-item'><a class='page-link' href='#' aria-label='Previous'><span aria-hidden='true'>Previous</span></a></li>";
                                            }


                                            // Páginas subsequentes
                                            for ($i = 1; $i < $numPaginas + 1; $i++) {
                                                echo "<li class='page-item'><a class='page-link' href='ConsultarInstrutor.php?p=$i'> " . $i . "  </a></li>";
                                            }


                                            // Página anterior
                                            if ($pagina < $numPaginas) {
                                                echo "<li class='page-item'><a class='page-link' href='ConsultarInstrutor.php?p=$proxima' aria-label='Próximo'><span aria-hidden='true'>Next</span></a></li>";
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