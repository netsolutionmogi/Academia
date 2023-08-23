<?php
/*
Criação da classe ProdutoDAO com o CRUD
*/
require_once __DIR__ . '../../conexao/Conexao.php';
require_once __DIR__ . '../../model/Produtos.php';

class ProdutoDAO {

    public function SalvarProduto( Produto $produto ) {
        try {
            $sql = "INSERT INTO produto ( 
                 nm_Produto,desc_Produto,vlr_unit_Produto,qtde_Produto,
                 vlr_total_Produto,fk_ALUNO_id_Aluno)
                        VALUES (
                            :nm_Produto,
                            :desc_Produto,
                            :vlr_unit_Produto,
                            :qtde_Produto,
                            :vlr_total_Produto,
                            :fk_ALUNO_id_Aluno)";

            $Conexao = new Conexao();
            $Data_Cadastro = date( 'Y-m-d' );
            $vlr_unit_Produto     = str_replace( ',', '.', $produto->getvlr_unit_Produto() );
            $vlr_total_Produto     = str_replace( ',', '.', $produto->getvlr_total_Produto() );

            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':nm_Produto', $produto->getnm_Produto() );
            $statement_sql->bindValue( ':desc_Produto', $produto->getdesc_Produto() );
            $statement_sql->bindValue( ':vlr_unit_Produto', $vlr_unit_Produto );
            $statement_sql->bindValue( ':qtde_Produto', $produto->getqtde_Produto() );
            $statement_sql->bindValue( ':vlr_total_Produto', $vlr_total_Produto );
            $statement_sql->bindValue( ':fk_ALUNO_id_Aluno', $produto->getfk_ALUNO_id_Aluno() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print 'Erro ao Inserir Estoque <br>' . $e . '<br>';
        }
    }

    public function updateProduto( Produto $produto ) {
        try {
            $sql = "UPDATE produto set
                        nm_Produto        = :nm_Produto,
                        desc_Produto      = :desc_Produto,
                        vlr_unit_Produto  = :vlr_unit_Produto,
                        qtde_Produto      = :qtde_Produto,
                        vlr_total_Produto = :vlr_total_Produto,
                        fk_ALUNO_id_Aluno = :fk_ALUNO_id_Aluno
                            
                  WHERE id_Produto = :id_Produto";

            $Conexao = new Conexao();
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Produto', $produto->getid_Produto() );
            $statement_sql->bindValue( ':nm_Produto', $produto->getnm_Produto() );
            $statement_sql->bindValue( ':desc_Produto', $produto->getdesc_Produto() );
            $statement_sql->bindValue( ':vlr_unit_Produto', $produto->getvlr_unit_Produto() );
            $statement_sql->bindValue( ':qtde_Produto', $produto->getqtde_Produto() );
            $statement_sql->bindValue( ':vlr_total_Produto', $produto->getvlr_total_Produto() );
            $statement_sql->bindValue( ':fk_ALUNO_id_Aluno', $produto->getfk_ALUNO_id_Aluno() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function deleteProduto( Produto $produto ) {
        try {
            $sql = 'DELETE FROM produto WHERE id_Produto = :id_Produto';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_produto', $produto->getid_Produto() );
            return $statement_sql->execute();
        } catch ( Exception $e ) {
            echo "Erro ao Excluir Produto<br> $e <br>";
        }
    }

    public function getProduto() {
        try {
            $sql = 'SELECT * FROM produto order by nm_produto asc';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->query( $sql );
            $resultado = array();
            while ( $row = $statement_sql->fetch( PDO::FETCH_ASSOC ) ) {
                $produto = new Produto();
                $produto->setid_Produto( $row[ 'id_Produto' ] );
                $produto->setnm_Produto( $row[ 'nm_Produto' ] );
                $produto->setdesc_Produto( $row[ 'desc_Produto' ] );
                $produto->setqtde_Produto( $row[ 'qtde_Produto' ] );
                $produto->setvlr_unit_Produto( $row[ 'vlr_unit_Produto' ] );
                $produto->setvlr_total_Produto( $row[ 'vlr_total_Produto' ] );
                $produto->setFK_ALUNO_id_Aluno( $row[ 'fk_ALUNO_id_Aluno' ] );
                $resultado[] = $produto;
            }
            return $resultado;
        } catch ( Exception $e ) {
            print 'Ocorreu um erro ao tentar Buscar Todos.' . $e;
        }
    }

    public function paginacao_Produto( $inicio, $registros ) {

        try {
            $condition  =   '';
            if ( isset( $_POST[ 'search' ] ) and $_POST[ 'search' ] != '' ) {
                $condition  .=  'Where nm_Produto LIKE :search ';
            }
            $sql = 'select * from produto '.$condition." LIMIT $inicio, $registros";
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            if ( isset( $_POST[ 'search' ] ) ) {
                $search = $_POST[ 'search' ];
                $search = '%' . $search . '%';
                $statement_sql->bindParam( ':search', $search );

            }
            $statement_sql->execute();
            $resultado = array();
            if ( $statement_sql ) {
                while ( $row = $statement_sql->fetch( PDO::FETCH_ASSOC ) ) {
                    $produto = new Produto();
                    $produto->setid_Produto( $row[ 'id_Produto' ] );
                    $produto->setnm_Produto( $row[ 'nm_Produto' ] );
                    $produto->setdesc_Produto( $row[ 'desc_Produto' ] );
                    $produto->setqtde_Produto( $row[ 'qtde_Produto' ] );
                    $produto->setvlr_unit_Produto( $row[ 'vlr_unit_Produto' ] );
                    $produto->setvlr_total_Produto( $row[ 'vlr_total_Produto' ] );
                    $produto->setFK_ALUNO_id_Aluno( $row[ 'fk_ALUNO_id_Aluno' ] );
                    $resultado[] = $produto;
                }
            }
            return $resultado;
        } catch ( PDOException $e ) {
            print ' Erro ' . $e->getMessage();
        }
    }

    public function ProcurarProdutoPorCodigo( Produto $produto ) {

        try {
            $sql = 'select * from produto where id_Produto = :id_Produto';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Produto', $produto->getid_Produto() );
            $statement_sql->execute();
            $row =  $statement_sql->fetch( PDO::FETCH_ASSOC ) ;
            if ( $statement_sql ) {
                $produto->setid_Produto( $row[ 'id_Produto' ] );
                $produto->setnm_Produto( $row[ 'nm_Produto' ] );
                $produto->setdesc_Produto( $row[ 'desc_Produto' ] );
                $produto->setqtde_Produto( $row[ 'qtde_Produto' ] );
                $produto->setvlr_unit_Produto( $row[ 'vlr_unit_Produto' ] );
                $produto->setvlr_total_Produto( $row[ 'vlr_total_Produto' ] );
                $produto->setFK_ALUNO_id_Aluno( $row[ 'fk_ALUNO_id_Aluno' ] );

                return  $produto;
                //$statement_sql->debugDumpParams();
            }
        } catch ( PDOException $exc ) {
            print 'Erro :: ' . $exc->getMessage();
        }
    }

}

?>