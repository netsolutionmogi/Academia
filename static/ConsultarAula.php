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

                    <h1 class="h3 mb-3">Aula:</h1>

                    <div class="container-fluid p-2">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="h3 mb-4"><strong>Dias e Horas dos Treinos Oferecidos</strong></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="btn-group btn-group-sm">
                                    <a href="CadastroAula.php" class="btn btn-success"><i class="fa fa-plus">
                                        </i> Adicionar Aula</a>
                                </div>
                            </div>
                            <div class="col-md-4 p-2">
                                <form action="simple-results.html">
                                    <div class="input-group">
                                        <input type="search" class="form-control form-control-lg" placeholder="Buscar">
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
                                                <th>Descrição Atividade</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Braço</td>
                                                <td class="d-none d-md-table-cell">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Braço</td>
                                                <td class="d-none d-md-table-cell">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Braço</td>
                                                <td class="d-none d-md-table-cell">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="#" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div
                                class="d-flex aligns-items-center justify-content-center my-4 card text-center w-50 position-relative top-70 start-50 translate-middle">
                                <br>
                                <div class="align-self-center">
                                    <nav aria-label="...">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <span class="page-link">Previous</span>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active" aria-current="page">
                                                <span class="page-link">2</span>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
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

</body>

</html>