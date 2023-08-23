<?php

session_cache_limiter( 'private_no_expire' );

require_once __DIR__ . '../../static/controller/InstrutorController.php';
$instrutorController =  new InstrutorController();
// Verifica se existe os dados da sessão de login
$instrutorController->BuscarInstrutorLogado();
?>