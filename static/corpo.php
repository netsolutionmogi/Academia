<main class="content">
    <div class="container-fluid p-2">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-8">



            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h1 class="h3 mb-4"><strong>Alunos Cadastrados</strong></h1>
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


        </div>
        <div class="col-md-4 p-2">
            <div class="mb-3">
                <br>
            </div>
        </div>
    </div>
    <?php
           require_once __DIR__ . '../../static/controller/AlunosController.php';
           require_once __DIR__ . '../../static/model/Alunos.php';
           $alunoController =  new ALunosController();
           $aluno = new Aluno();
       
           $pagina = (isset($_GET['p'])) ? $_GET['p'] : 1;
           $alunosBean = $alunoController->buscar_Alunos();
           $total = count($alunosBean);
       
           $registros_por_pagina = 2;
           $numPaginas = ceil($total / $registros_por_pagina);
           $inicio = ($registros_por_pagina * $pagina) - $registros_por_pagina;
       ?>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Alunos:</h5>
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
                               $alunosBean = $alunoController->Buscar_paginacao_Alunos($inicio, $registros_por_pagina);
                               $count = count($alunosBean);
                              foreach ($alunosBean as $a) {
                             ?>
                        <tr>
                            <td>
                                <?php echo  $a->getnmAluno();?>
                            </td>
                            <td class="d-none d-xl-table-cell">
                                <?php echo $a->getemail_Aluno(); ?>
                            </td>
                            <td class="d-none d-xl-table-cell">
                                <?php echo $a->gettel_Aluno();?>
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
                                 echo "<li class='page-item disabled'><a class='page-link' href='index.php?p=$anterior' aria-label='Previous'> <span class='page-link'>Previous</span></a></li>";
                                } else {
                                echo "<li class='page-item'><a class='page-link' href='#' aria-label='Previous'><span aria-hidden='true'>Previous</span></a></li>";
                            }


                            // Páginas subsequentes
                            for ($i = 1; $i < $numPaginas + 1; $i++) {
                                echo "<li class='page-item'><a class='page-link' href='index.php?p=$i'> " . $i . "  </a></li>";
                            }
                            // Página anterior
                             if ($pagina < $numPaginas) {
                                 echo "<li class='page-item'><a class='page-link' href='index.php?p=$proxima' aria-label='Próximo'><span aria-hidden='true'>Next</span></a></li>";
                                 } else {
                                echo "<li class='page-item'><a class='page-link' href='#' aria-label='Próximo'><span aria-hidden='true'>Next</span></a></li>";
                                 }
                             ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--<div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card flex-fill w-100">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Monthly Sales</h5>
                    </div>
                    <div class="card-body d-flex w-100">
                        <div class="align-self-center chart chart-lg">
                            <canvas id="chartjs-dashboard-bar"></canvas>
                        </div>
                    </div>
                </div>
            </div>-->
    </div>

    </div>
</main>