<?php
require_once __DIR__ . '../../conexao/Conexao.php';
require_once __DIR__ . '../../model/Produtos.php';
require_once __DIR__ . '../../dao/ProdutosDAO.php';

//instancia as classes
class ProdutoController {

    public function gravarProduto() {

        $produto = new Produto();
        $produtodao = new ProdutoDAO();
        $produto->setnm_Produto( $_POST['nome']);
        $produto->setdesc_Produto( $_POST['desc_produto'] );
        $produto->setqtde_Produto($_POST['qtde_Produto']);
        $produto->setvlr_unit_Produto( $_POST['vlr_unit_Produto']);
        $produto->setvlr_total_Produto($_POST['vlr_total_Produto']);
        $produto->setfk_ALUNO_id_Aluno( $_POST['fk_ALUNO_id_Aluno'] );

        $produtodao->SalvarProduto($produto);

    }

    public function AlterarProduto() {

        $produtodao = new ProdutoDAO();
        $produto = new Produto();
        $produto->setid_Produto( $_POST['id_Produto'] );
        $produto->setnm_Produto( $_POST['nome']);
        $produto->setdesc_Produto( $_POST['desc_produto'] );
        $produto->setqtde_Produto($_POST['qtde_Produto']);
        $produto->setvlr_unit_Produto( $_POST['vlr_unit_Produto']);
        $produto->setvlr_total_Produto($_POST['vlr_total_Produto']);
        $produto->setfk_ALUNO_id_Aluno( $_POST['fk_ALUNO_id_Aluno'] );
        $produtodao->updateProduto($produto);

    }
    public function buscar_Produto() {

        $produto = new ProdutoDAO();
        return $produto->getProduto();
    }
    public function BuscarProdutoPorCodigo() {
        $produto = new Produto();
        $produtodao = new ProdutoDAO();
        $produto->setid_Produto($_GET["id_Produto"]);
        return $produtodao->ProcurarProdutoPorCodigo($produto);
    }
    public function Buscar_paginacao_Produto($inicio, $registros) {
        $produtodao = new ProdutoDAO();
        return $produtodao->paginacao_Produto($inicio, $registros);
    }
    public function Deletar_Produto() {

        $produto = new Produto();
        $produtodao = new ProdutoDAO();
        $produto->setid_Produto($_GET["id_Produto"]);
        return $produtodao->deleteProduto($produto );
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