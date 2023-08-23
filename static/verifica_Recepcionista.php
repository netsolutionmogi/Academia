<?php

session_cache_limiter( 'private_no_expire' );

require_once __DIR__ . '../../static/controller/RecepcionistaController.php';
$RecepcionistaController =  new RecepcionistaController();

// Verifica se existe os dados da sessão de login
$RecepcionistaController->BuscarRecepcionistaLogado();
?>