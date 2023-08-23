<?php
/*
Criação da classe Atividade com o CRUD
*/
require_once __DIR__ . '../../conexao/Conexao.php';
require_once __DIR__ . '../../model/Atividade.php';

class AtividadeDAO {

    public function SalvarAtividade( Atividade $atividade ) {
        try {

            $sql = "INSERT INTO atividade(                   
                    nm_Atividade,vlr_mensal_Atividade,desco_mensal_Atividade,  
                    vlr_total_Atividade,desc_Atividade,data_cad_Treino)
                  VALUES (
                    :nm_Atividade,
                    :vlr_mensal_Atividade,
                    :desco_mensal_Atividade,  
                    :vlr_total_Atividade,
                    :desc_Atividade,
                    :data_cad_Treino)";

            $Conexao = new Conexao();
            date_default_timezone_set( 'America/Sao_Paulo' );
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );

            $vlr_mensal_Atividade   = str_replace( ',', '.', $atividade->getvlr_mensal_Atividade() );
            $vlr_total_Atividade    = str_replace( ',', '.',  $atividade->getvlr_total_Atividade() );

            $statement_sql->bindValue( ':nm_Atividade', $atividade->getnm_Atividade() );
            $statement_sql->bindValue( ':vlr_mensal_Atividade', $vlr_mensal_Atividade );
            $statement_sql->bindValue( ':desco_mensal_Atividade', $atividade->getdesco_mensal_Atividade() );
            $statement_sql->bindValue( ':vlr_total_Atividade', $vlr_total_Atividade );
            $statement_sql->bindValue( ':desc_Atividade', $atividade->getdesc_Atividade() );
            $statement_sql->bindValue( ':data_cad_Treino', $Data_Cadastro );

            return  $statement_sql->execute();
        } catch ( Exception $e ) {
            print 'Erro ao Inserir usuario <br>' . $e . '<br>';
        }
    }

    public function updateAtividade( Atividade $atividade ) {
        try {
            $sql = "UPDATE atividade set
                    nm_Atividade           = :nm_Atividade,
                    vlr_mensal_Atividade   = :vlr_mensal_Atividade,
                    desco_mensal_Atividade = :desco_mensal_Atividade,  
                    vlr_total_Atividade    = :vlr_total_Atividade,
                    desc_Atividade         = :desc_Atividade,
                    data_cad_Treino        = :data_cad_Treino            
                                                                       
                  WHERE id_Atividade = :id_Atividade";
            $Conexao = new Conexao();
            date_default_timezone_set( 'America/Sao_Paulo' );
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );

            $vlr_mensal_Atividade   = str_replace( ',', '.', $atividade->getvlr_mensal_Atividade() );
            $vlr_total_Atividade    = str_replace( ',', '.',  $atividade->getvlr_total_Atividade() );

            $statement_sql->bindValue( ':id_Atividade', $atividade->getid_Atividade() );
            $statement_sql->bindValue( ':nm_Atividade', $atividade->getnm_Atividade() );
            $statement_sql->bindValue( ':vlr_mensal_Atividade', $vlr_mensal_Atividade );
            $statement_sql->bindValue( ':desco_mensal_Atividade', $atividade->getdesco_mensal_Atividade() );
            $statement_sql->bindValue( ':vlr_total_Atividade', $vlr_total_Atividade );
            $statement_sql->bindValue( ':desc_Atividade', $atividade->getdesc_Atividade() );
            $statement_sql->bindValue( ':data_cad_Treino', $Data_Cadastro );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function getAtividade() {
        try {

            $sql = 'SELECT * FROM atividade order by nm_Atividade asc';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->query( $sql );
            $resultado = array();
            while ( $row = $statement_sql->fetch( PDO::FETCH_ASSOC ) ) {
                $atividade = new Atividade();
                $atividade->setid_Atividade( $row[ 'id_Atividade' ] );
                $atividade->setnm_Atividade( $row[ 'nm_Atividade' ] );
                $atividade->setvlr_mensal_Atividade( $row[ 'vlr_mensal_Atividade' ] );
                $atividade->setdesco_mensal_Atividade( $row[ 'desco_mensal_Atividade' ] );
                $atividade->setvlr_total_Atividade( $row[ 'vlr_total_Atividade' ] );
                $atividade->setdesc_Atividade( $row[ 'desc_Atividade' ] );

                $resultado[] = $atividade;
            }
            return $resultado;
        } catch ( Exception $e ) {
            print 'Ocorreu um erro ao tentar Buscar Todos.' . $e;
        }
    }

    public function paginacao_Atividade( $inicio, $registros ) {

        try {

            $condition  =   '';
            if ( isset( $_POST[ 'search' ] ) and $_POST[ 'search' ] != '' ) {
                $condition  .=  'Where nm_Atividade LIKE :search ';
            }
            $sql = 'select * from atividade '.$condition." LIMIT $inicio, $registros";
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            if ( isset( $_POST[ 'search' ] ) ) {
                $search = $_POST[ 'search' ];
                $search = '%' . $search . '%';
                $statement_sql->bindParam( ':search', $search );

            }
            $statement_sql->execute();
            $resultado = array();
            while ( $row = $statement_sql->fetch( PDO::FETCH_ASSOC ) ) {
                $atividade = new Atividade();
                $atividade->setid_Atividade( $row[ 'id_Atividade' ] );
                $atividade->setnm_Atividade( $row[ 'nm_Atividade' ] );
                $atividade->setvlr_mensal_Atividade( $row[ 'vlr_mensal_Atividade' ] );
                $atividade->setdesco_mensal_Atividade( $row[ 'desco_mensal_Atividade' ] );
                $atividade->setvlr_total_Atividade( $row[ 'vlr_total_Atividade' ] );
                $atividade->setdesc_Atividade( $row[ 'desc_Atividade' ] );

                $resultado[] = $atividade;
            }
            return $resultado;
        } catch ( PDOException $e ) {
            print ' Erro ' . $e->getMessage();
        }
    }

    public function ProcurarAtividadePorCodigo( Atividade $atividade ) {

        try {
            $sql = 'select * from atividade where id_Atividade = :id_Atividade';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Atividade', $atividade->getid_Atividade() );
            $statement_sql->execute();
            $row =  $statement_sql->fetch( PDO::FETCH_ASSOC ) ;
            if ( $statement_sql ) {
                $atividade->setid_Atividade( $row[ 'id_Atividade' ] );
                $atividade->setnm_Atividade( $row[ 'nm_Atividade' ] );
                $atividade->setvlr_mensal_Atividade( $row[ 'vlr_mensal_Atividade' ] );
                $atividade->setdesco_mensal_Atividade( $row[ 'desco_mensal_Atividade' ] );
                $atividade->setvlr_total_Atividade( $row[ 'vlr_total_Atividade' ] );
                $atividade->setdesc_Atividade( $row[ 'desc_Atividade' ] );
            }
            return $atividade;
            //$statement_sql->debugDumpParams();

        } catch ( PDOException $exc ) {
            print 'Erro :: ' . $exc->getMessage();
        }
    }

    public function deletarAtividade( Atividade $atividade ) {
        try {
            $sql = 'DELETE FROM atividade WHERE id_Atividade = :id_Atividade';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Atividade', $atividade->getid_Atividade() );
            return $statement_sql->execute();
        } catch ( Exception $e ) {
            echo "Erro ao Excluir Atividade<br> $e <br>";
        }
    }

    private function listaAtividade( $row ) {
        $atividade = new Atividade();
        $atividade->setid_Atividade( $row[ 'id_Atividade' ] );
        $atividade->setnm_Atividade( $row[ 'nm_Atividade' ] );
        $atividade->setvlr_mensal_Atividade( $row[ 'vlr_mensal_Atividade' ] );
        $atividade->setdesco_mensal_Atividade( $row[ 'desco_mensal_Atividade' ] );
        $atividade->setvlr_total_Atividade( $row[ 'vlr_total_Atividade' ] );
        $atividade->setdesc_Atividade( $row[ 'desc_Atividade' ] );

        return $atividade;
    }
}

?>