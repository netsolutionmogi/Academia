<?php
/*
Criação da classe AlunosDAO com o CRUD
*/
include_once( '../conexao/Conexao.php' );
include_once( '../model/Estoque.php' );

class EstoqueDAO {

    public function SalvarEstoque( Estoque $estoque ) {
        try {

            $sql = "INSERT INTO ESTOQUE ( 
            nm_prod_Estoque,qtde_prod_Estoque,data_cad_prod_Estoque,data_saida_prod_Estoque,
            hora_cad_prod_Estoque,hora_saida_prod_Estoque,FK_PRODUTO_id_Produto)
                        VALUES (
                            :nm_prod_Estoque,
                            :qtde_prod_Estoque,
                            :data_cad_prod_Estoque,
                            :data_saida_prod_Estoque,
                            :hora_cad_prod_Estoque,
                            :hora_saida_prod_Estoque,
                            :FK_PRODUTO_id_Produto)";

            $Conexao = new Conexao();
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':nm_prod_Estoque', $estoque->getnm_prod_Estoque() );
            $statement_sql->bindValue( ':qtde_prod_Estoque', $estoque->getqtde_prod_Estoque() );
            $statement_sql->bindValue( ':data_cad_prod_Estoque', $Data_Cadastro );
            $statement_sql->bindValue( ':data_saida_prod_Estoque', $Data_Cadastro );
            $statement_sql->bindValue( ':hora_cad_prod_Estoque', time() );
            $statement_sql->bindValue( ':hora_saida_prod_Estoque', time() );
            $statement_sql->bindValue( ':FK_PRODUTO_id_Produto', $estoque->getFK_PRODUTO_id_Produto() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print 'Erro ao Inserir Estoque <br>' . $e . '<br>';
        }
    }

    public function updateEstoque( Estoque $estoque ) {
        try {
            $sql = "UPDATE ESTOQUE set
                
                    nm_prod_Estoque         = :nm_prod_Estoque,
                    qtde_prod_Estoque       = :qtde_prod_Estoque,
                    data_cad_prod_Estoque   = :data_cad_prod_Estoque,
                    data_saida_prod_Estoque = :data_saida_prod_Estoque,
                    hora_cad_prod_Estoque   = :hora_cad_prod_Estoque,
                    hora_saida_prod_Estoque = :hora_saida_prod_Estoque,
                    FK_PRODUTO_id_Produto   = :FK_PRODUTO_id_Produto
                  WHERE id_Aluno = :id_prod_Estoque";

            $Conexao = new Conexao();
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_prod_Estoque', $estoque->getid_prod_Estoque() );
            $statement_sql->bindValue( ':nm_prod_Estoque', $estoque->getnm_prod_Estoque() );
            $statement_sql->bindValue( ':qtde_prod_Estoque', $estoque->getqtde_prod_Estoque() );
            $statement_sql->bindValue( ':data_cad_prod_Estoque', $Data_Cadastro );
            $statement_sql->bindValue( ':data_saida_prod_Estoque', $Data_Cadastro );
            $statement_sql->bindValue( ':hora_cad_prod_Estoque', time() );
            $statement_sql->bindValue( ':hora_saida_prod_Estoque', time() );
            $statement_sql->bindValue( ':FK_PRODUTO_id_Produto', $estoque->getFK_PRODUTO_id_Produto() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function deleteEstoque( Estoque $estoque ) {
        try {
            $sql = 'DELETE FROM ESTOQUE WHERE id_prod_Estoque = :id';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_prod_Estoque', $estoque->getid_prod_Estoque() );
            return $statement_sql->execute();
        } catch ( Exception $e ) {
            echo "Erro ao Excluir Estoque<br> $e <br>";
        }
    }

    public function getEstoque() {
        try {
            $sql = 'SELECT * FROM ESTOQUE order by nm_prod_Estoque asc';
            $Conexao = new Conexao();
            $result = $Conexao->Conectar()->query( $sql );
            $lista = $result->fetchAll( PDO::FETCH_ASSOC );
            $f_lista = array();
            foreach ( $lista as $l ) {
                $f_lista[] = $this->listaEstoque( $l );
            }
            return $f_lista;
        } catch ( Exception $e ) {
            print 'Ocorreu um erro ao tentar Buscar Todos.' . $e;
        }
    }

    private function listaEstoque( $row ) {
        $estoque = new Estoque();
        $estoque->setid_prod_Estoque( $row[ 'id_prod_Estoque' ] );
        $estoque->setnm_prod_Estoque( $row[ 'nm_prod_Estoque' ] );
        $estoque->setqtde_prod_Estoque( $row[ 'qtde_prod_Estoque' ] );
        $estoque->setFK_PRODUTO_id_Produto( $row[ 'FK_PRODUTO_id_Produto' ] );

        return $estoque;
    }

}

?>