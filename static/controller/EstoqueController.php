<?php
include_once '../conexao/Conexao.php';
include_once '../model/Estoque.php';
include_once '../dao/EstoqueDAO.php';

//instancia as classes
class EstoqueController {

    public function gravarEstoque() {

        $estoquedao = new EstoqueDAO();
        $estoque = new Estoque();
        $estoque->setid_prod_Estoque( $_POST[''] );
        $estoque->setnm_prod_Estoque( $_POST[''] );
        $estoque->setqtde_prod_Estoque( $_POST[''] );
        $estoque->setFK_PRODUTO_id_Produto($_POST[''] );

        $estoquedao->SalvarEstoque($estoque);

    }

    public function AlterarAlunos() {

        $estoquedao = new EstoqueDAO();
        $estoque = new Estoque();
        $estoque->setid_prod_Estoque( $_POST[''] );
        $estoque->setnm_prod_Estoque( $_POST[''] );
        $estoque->setqtde_prod_Estoque( $_POST[''] );
        $estoque->setFK_PRODUTO_id_Produto($_POST[''] );
        $estoquedao->updateEstoque($estoque);

    }
    public function buscar_Estoque() {

        $estoque = new EstoqueDAO();
        return $estoque->getEstoque();
    }

    public function Deletar_Estoque() {

        $estoque = new Estoque();
        $estoquedao = new EstoqueDAO();
        $estoque->setid_prod_Estoque($_GET["id_prod_Estoque"]);
        return $estoquedao->deleteEstoque($estoque);
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