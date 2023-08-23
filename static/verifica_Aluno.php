<?php

session_cache_limiter( 'private_no_expire' );

require_once __DIR__ . '../../static/controller/AlunosController.php';
$alunoController =  new ALunosController();
$aluno = new Aluno();

// Verifica se existe os dados da sessão de login
$alunoController->BuscarAlunoLogado();
?>