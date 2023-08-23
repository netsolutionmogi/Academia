<?php
require_once __DIR__ . '../../conexao/Conexao.php';
require_once __DIR__ . '../../model/Atividade.php';
require_once __DIR__ . '../../dao/AtividadeDAO.php';

//instancia as classes
class AtividadeController {

    public function gravarAtividade() {

        $atividade = new Atividade();
        $atividadedao = new AtividadeDAO();
        $atividade->setnm_Atividade( $_POST[ 'nm_Atividade' ] );
        $atividade->setvlr_mensal_Atividade($_POST[ 'vlr_mensal_Atividade' ] );
        $atividade->setdesco_mensal_Atividade( $_POST[ 'desco_mensal_Atividade' ] );
        $atividade->setvlr_total_Atividade( $_POST[ 'vlr_total_Atividade' ] );
        $atividade->setdesc_Atividade($_POST[ 'desc_Atividade' ] );
        $atividadedao->SalvarAtividade($atividade);

    }

    public function AlterarAtividade() {

        $atividade = new Atividade();
        $atividadedao = new AtividadeDAO();
        $atividade->setid_Atividade( $_POST[ 'id_Atividade' ] );
        $atividade->setnm_Atividade( $_POST[ 'nm_Atividade' ] );
        $atividade->setvlr_mensal_Atividade($_POST[ 'vlr_mensal_Atividade' ] );
        $atividade->setdesco_mensal_Atividade( $_POST[ 'desco_mensal_Atividade' ] );
        $atividade->setvlr_total_Atividade( $_POST[ 'vlr_total_Atividade' ] );
        $atividade->setdesc_Atividade($_POST[ 'desc_Atividade' ] );
        $atividadedao->updateAtividade($atividade);

    }
    public function buscar_Atividade() {

        $atividadedao = new AtividadeDAO();
        return $atividadedao->getAtividade();
    }
    public function BuscarAtividadePorCodigo() {
        $atividade = new Atividade();
        $atividadedao = new AtividadeDAO();
        $atividade->setid_Atividade($_GET["id_Atividade"]);
        return $atividadedao->ProcurarAtividadePorCodigo($atividade);
    }
    public function Buscar_paginacao_Atividade($inicio, $registros) {
        $atividadedao = new AtividadeDAO();
        return $atividadedao->paginacao_Atividade($inicio, $registros);
    }

    public function Deletar_Atividade() {

        $atividade = new Atividade();
        $atividadedao = new AtividadeDAO();
        $atividade->setid_Atividade($_GET["id_Atividade"]);
        return $atividadedao->deletarAtividade($atividade);
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