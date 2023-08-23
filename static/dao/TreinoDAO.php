<?php
/*
Criação da classe Usuario com o CRUD
*/
require_once __DIR__ . '../../conexao/Conexao.php';
require_once __DIR__ . '../../model/Treino.php';

class TreinoDAO {

    public function SalvarTreino( Treino $treino ) {
        try {

            $sql = "INSERT INTO Treino_ATIVIDADE(                   
                    desc_faz_Atividade,data_inicio_semana_faz_Atividade,
                    hora_inicio_semana_faz_Atividade,data_fim_semana_faz_Atividade,
                    hora_fim_semana_faz_Atividade,data_cad_faz_Atividade,
                    FK_RECEPCIONISTA_id_Recepcionista)
                  VALUES (
                    :desc_faz_Atividade,
                    :data_inicio_semana_faz_Atividade,
                    :hora_inicio_semana_faz_Atividade,
                    :data_fim_semana_faz_Atividade,
                    :hora_fim_semana_faz_Atividade,
                    :data_cad_faz_Atividade,
                    :FK_RECEPCIONISTA_id_Recepcionista)";

            $Conexao = new Conexao();
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':desc_faz_Atividade', $treino->getdesc_faz_Atividade() );
            $statement_sql->bindValue( ':data_inicio_semana_faz_Atividade', $treino->getdata_inicio_semana_faz_Atividade() );
            $statement_sql->bindValue( ':hora_inicio_semana_faz_Atividade', $treino->getdata_fim_semana_faz_Atividade() );
            $statement_sql->bindValue( ':data_fim_semana_faz_Atividade', $treino->getdata_fim_semana_faz_Atividade() );
            $statement_sql->bindValue( ':hora_fim_semana_faz_Atividade', $treino->gethora_fim_semana_faz_Atividadeo() );
            $statement_sql->bindValue( ':data_cad_faz_Atividade', $Data_Cadastro );
            $statement_sql->bindValue( ':FK_RECEPCIONISTA_id_Recepcionista', $treino->getRecepcionista_id_Recepcionista() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print 'Erro ao Inserir Treino Atividade <br>' . $e . '<br>';
        }
    }

    public function getTreino() {
        try {
            $sql = 'SELECT tbl_recepcionista.nm_Recepcionista,
            treino_atividade.desc_faz_Atividade, 
            treino_atividade.data_inicio_semana_faz_Atividade,
            treino_atividade.data_fim_semana_faz_Atividade,
            treino_atividade.id_Atividade_faz_Atividade FROM treino_atividade INNER JOIN tbl_recepcionista ON tbl_recepcionista.id_Recepcionista = treino_atividade.FK_RECEPCIONISTA_id_Recepcionista';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->query( $sql );
            $resultado = array();

            while ( $row = $statement_sql->fetch( PDO::FETCH_ASSOC ) ) {
                $treino = new Treino();
                $treino->setnm_Recepcionista( $row[ 'nm_Recepcionista' ] );
                $treino->setid_Atividade_faz_Atividade( $row[ 'id_Atividade_faz_Atividade' ] );
                $treino->setdesc_faz_Atividade( $row[ 'desc_faz_Atividade' ] );
                $treino->setdata_inicio_semana_faz_Atividade( $row[ 'data_inicio_semana_faz_Atividade' ] );
                $treino->setdata_fim_semana_faz_Atividade( $row[ 'data_fim_semana_faz_Atividade' ] );
                $resultado[] = $treino;
            }

            return $resultado;
        } catch ( Exception $e ) {
            print 'Ocorreu um erro ao tentar Buscar Todos.' . $e;
        }
    }

    public function ProcurarTreinoPorCodigo( Treino $treino ) {

        try {
            $sql = 'select * from Treino_ATIVIDADE where id_Atividade_faz_Atividade = :id_Atividade_faz_Atividade';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Atividade_faz_Atividade', $treino->getid_Atividade_faz_Atividade() );
            $statement_sql->execute();
            $row =  $statement_sql->fetch( PDO::FETCH_ASSOC ) ;
            if ( $statement_sql ) {
                $treino = new Treino();
                $treino->setid_Atividade_faz_Atividade( $row[ 'id_Atividade_faz_Atividade' ] );
                $treino->setdata_inicio_semana_faz_Atividade( $row[ 'data_inicio_semana_faz_Atividade' ] );
                $treino->setdata_fim_semana_faz_Atividade( $row[ 'data_fim_semana_faz_Atividade' ] );
                $treino->sethora_inicio_semana_faz_Atividade( $row[ 'hora_inicio_semana_faz_Atividade' ] );
                $treino->sethora_fim_semana_faz_Atividadeo( $row[ 'hora_fim_semana_faz_Atividade' ] );
                $treino->setdesc_faz_Atividade( $row[ 'desc_faz_Atividade' ] );
                $treino->setdata_cad_faz_Atividade( $row[ 'data_cad_faz_Atividade' ] );
                $treino->setFK_RECEPCIONISTA_id_Recepcionista( $row[ 'FK_RECEPCIONISTA_id_Recepcionista' ] );
            }
            return $treino;
            //$statement_sql->debugDumpParams();

        } catch ( PDOException $exc ) {
            print 'Erro :: ' . $exc->getMessage();
        }
    }

    public function updateTreino( Treino $treino ) {
        try {
            $sql = "UPDATE Treino_ATIVIDADE set
                    desc_faz_Atividade                = :desc_faz_Atividade,
                    data_inicio_semana_faz_Atividade  = :data_inicio_semana_faz_Atividade,
                    hora_inicio_semana_faz_Atividade  = :hora_inicio_semana_faz_Atividade,
                    data_fim_semana_faz_Atividade     = :data_fim_semana_faz_Atividade,
                    hora_fim_semana_faz_Atividade     = :hora_fim_semana_faz_Atividade,
                    data_cad_faz_Atividade            = :data_cad_faz_Atividade,
                    FK_RECEPCIONISTA_id_Recepcionista = :FK_RECEPCIONISTA_id_Recepcionista
                                                                       
                  WHERE id_Atividade_faz_Atividade = :id_Atividade_faz_Atividade";

            $Conexao = new Conexao();
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Atividade_faz_Atividade', $treino->getid_Atividade_faz_Atividade() );
            $statement_sql->bindValue( ':desc_faz_Atividade', $treino->getdesc_faz_Atividade() );
            $statement_sql->bindValue( ':data_inicio_semana_faz_Atividade', $treino->getdata_inicio_semana_faz_Atividade() );
            $statement_sql->bindValue( ':hora_inicio_semana_faz_Atividade', $treino->getdata_fim_semana_faz_Atividade() );
            $statement_sql->bindValue( ':data_fim_semana_faz_Atividade', $treino->getdata_fim_semana_faz_Atividade() );
            $statement_sql->bindValue( ':hora_fim_semana_faz_Atividade', $treino->gethora_fim_semana_faz_Atividadeo() );
            $statement_sql->bindValue( ':data_cad_faz_Atividade', $Data_Cadastro );
            $statement_sql->bindValue( ':FK_RECEPCIONISTA_id_Recepcionista', $treino->getRecepcionista_id_Recepcionista() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function paginacao_Treino_Atividade( $inicio, $registros ) {

        try {

            $condition  =   '';
            if ( isset( $_POST[ 'search' ] ) and $_POST[ 'search' ] != '' ) {
                $condition  .=  'Where desc_faz_Atividade LIKE :search ';
            }
            $sql = 'SELECT tbl_recepcionista.nm_Recepcionista,
            treino_atividade.desc_faz_Atividade, 
            treino_atividade.data_inicio_semana_faz_Atividade,
            treino_atividade.data_fim_semana_faz_Atividade,
            treino_atividade.id_Atividade_faz_Atividade 
            FROM treino_atividade INNER JOIN tbl_recepcionista 
            ON tbl_recepcionista.id_Recepcionista = treino_atividade.FK_RECEPCIONISTA_id_Recepcionista '.$condition." LIMIT $inicio, $registros";
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
                $treino = new Treino();
                $treino->setid_Atividade_faz_Atividade( $row[ 'id_Atividade_faz_Atividade' ] );
                $treino->setnm_Recepcionista( $row[ 'nm_Recepcionista' ] );
                $treino->setdata_inicio_semana_faz_Atividade( $row[ 'data_inicio_semana_faz_Atividade' ] );
                $treino->setdata_fim_semana_faz_Atividade( $row[ 'data_fim_semana_faz_Atividade' ] );
                $treino->setdesc_faz_Atividade( $row[ 'desc_faz_Atividade' ] );

                $resultado[] = $treino;
            }
            return $resultado;
        } catch ( PDOException $e ) {
            print ' Erro ' . $e->getMessage();
        }
    }

    public function deleteTreino( Treino $treino ) {
        try {
            $sql = 'DELETE FROM Treino_ATIVIDADE WHERE id_Atividade_faz_Atividade = :id_Atividade_faz_Atividade';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Atividade_faz_Atividade', $treino->getid_Atividade_faz_Atividade() );
            return $statement_sql->execute();
        } catch ( Exception $e ) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }

    private function listaTreino( $row ) {
        $treino = new Treino();
        $treino->setid_Atividade_faz_Atividade( $row[ 'id_Atividade_faz_Atividade' ] );
        $treino->setdata_inicio_semana_faz_Atividade( $row[ 'data_inicio_semana_faz_Atividade' ] );
        $treino->setdata_fim_semana_faz_Atividade( $row[ 'data_fim_semana_faz_Atividade' ] );
        $treino->sethora_inicio_semana_faz_Atividade( $row[ 'hora_inicio_semana_faz_Atividade' ] );
        $treino->sethora_fim_semana_faz_Atividadeo( $row[ 'hora_fim_semana_faz_Atividade' ] );
        $treino->setdesc_faz_Atividade( $row[ 'desc_faz_Atividade' ] );
        $treino->setdata_cad_faz_Atividade( $row[ 'data_cad_faz_Atividade' ] );
        $treino->setFK_RECEPCIONISTA_id_Recepcionista( $row[ 'FK_RECEPCIONISTA_id_Recepcionista' ] );
        $treino->setFK_INSTRUTOR_id_Instrutor( $row[ 'FK_INSTRUTOR_id_Instrutor' ] );
        $treino->setAluno_id_Aluno( $row[ 'FK_ALUNO_id_Aluno' ] );
        return $treino;

    }
}

?>