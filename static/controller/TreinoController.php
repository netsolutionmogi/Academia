<?php
require_once __DIR__ . '../../conexao/Conexao.php';
require_once __DIR__ . '../../model/Treino.php';
require_once __DIR__ . '../../dao/TreinoDAO.php';

//instancia as classes
class TreinoController {

    public function gravarTreinoAtividade() {

        $treinodao = new TreinoDAO();
        $treino = new Treino();
        $treino->setdata_inicio_semana_faz_Atividade( $_POST[ 'data_inicio_semana_faz_Atividade' ] );
        $treino->setdata_fim_semana_faz_Atividade( $_POST[ 'data_fim_semana_faz_Atividade' ] );
        $treino->sethora_inicio_semana_faz_Atividade( $_POST[ 'hora_inicio_semana_faz_Atividade' ] );
        $treino->sethora_fim_semana_faz_Atividadeo( $_POST[ 'hora_fim_semana_faz_Atividade' ] );
        $treino->setdesc_faz_Atividade( $_POST[ 'desc_faz_Atividade' ] );
        $treino->setFK_RECEPCIONISTA_id_Recepcionista( $_POST[ 'FK_RECEPCIONISTA_id_Recepcionista' ] );
        $treinodao->SalvarTreino($treino);

    }

    public function AlterarTreinoAtividade() {

        $treinodao = new TreinoDAO();
        $treino = new Treino();
        $treino->setid_Atividade_faz_Atividade($_POST['id_Atividade_faz_Atividade'] );
        $treino->setdata_inicio_semana_faz_Atividade( $_POST[ 'data_inicio_semana_faz_Atividade' ] );
        $treino->setdata_fim_semana_faz_Atividade( $_POST[ 'data_fim_semana_faz_Atividade' ] );
        $treino->sethora_inicio_semana_faz_Atividade( $_POST[ 'hora_inicio_semana_faz_Atividade' ] );
        $treino->sethora_fim_semana_faz_Atividadeo( $_POST[ 'hora_fim_semana_faz_Atividade' ] );
        $treino->setdesc_faz_Atividade( $_POST[ 'desc_faz_Atividade' ] );
        $treino->setFK_RECEPCIONISTA_id_Recepcionista( $_POST[ 'FK_RECEPCIONISTA_id_Recepcionista' ] );
        $treinodao->updateTreino($treino );

    }
    public function buscar_Treino_Atividade() {

        $treinodao = new TreinoDAO();
        return $treinodao->getTreino();
    }
    public function BuscarTreinoPorCodigo() {
        $treino = new Treino();
        $treinodao = new TreinoDAO();
        $treino->setid_Atividade_faz_Atividade($_GET["id_Atividade_faz_Atividade"]);
        return $treinodao->ProcurarTreinoPorCodigo($treino);
    }
    public function ProcurarPaginacao_Treino_Atividade($inicio, $registros) {
        $treinodao = new TreinoDAO();
        return $treinodao->paginacao_Treino_Atividade($inicio, $registros);
    }

    public function Deletar_Treino_Atividade() {

        $treino = new Treino();
        $treinodao = new TreinoDAO();
        $treino->setid_Atividade_faz_Atividade($_GET["id_Atividade_faz_Atividade"]);
        return $treinodao->deleteTreino($treino);
    }
}

//pega todos os dados passado por POST

//$d = filter_input_array( INPUT_POST );

//se a operação for gravar entra nessa condição
/*if ( isset( $_POST[ 'cadastrar' ] ) ) {

    $usuario->setNome( $d[ 'nome' ] );
    $usuario->setSobrenome( $d[ 'sobrenome' ] );
    $usuario->setIdade( $d[ 'idade' ] );
    $usuario->setSexo( $d[ 'sexo' ] );

    $usuariodao->create( $usuario );

    header( 'Location: ../../' );
}

// se a requisição for editar
else if ( isset( $_POST[ 'editar' ] ) ) {

    $usuario->setNome( $d[ 'nome' ] );
    $usuario->setSobrenome( $d[ 'sobrenome' ] );
    $usuario->setIdade( $d[ 'idade' ] );
    $usuario->setSexo( $d[ 'sexo' ] );
    $usuario->setId( $d[ 'id' ] );

    $usuariodao->update( $usuario );

    header( 'Location: ../../' );
}
// se a requisição for deletar
else if ( isset( $_GET[ 'del' ] ) ) {

    $usuario->setId( $_GET[ 'del' ] );

    $usuariodao->delete( $usuario );

    header( 'Location: ../../' );
} else {
    header( 'Location: ../../' );
}*/