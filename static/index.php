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

            <?php include 'corpo.php'; ?>

            <footer class="footer">
                <?php include 'footer.php' ?>
            </footer>
        </div>
    </div>

    <script src="js/app.js"></script>


</body>

</html>