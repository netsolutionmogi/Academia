<?php
/*
Criação da classe MinistrarDAO com o CRUD
*/
include_once( '../conexao/Conexao.php' );
include_once( '../model/Ministrar.php' );

class MinistrarDAO {

    public function SalvarMinistrar( Ministrar $ministrar ) {
        try {

            $sql = "INSERT INTO MINISTRAR ( 
                fk_INSTRUTOR_id_Instrutor,fk_MUSCULACAO_id_Musculacao,data_inicial_Semana,
                hora_inicial_Semana,data_final_Semana,hora_final_Semana,nm_aula_Ministrada)
                        VALUES (
                            :fk_INSTRUTOR_id_Instrutor,
                            :fk_MUSCULACAO_id_Musculacao,
                            :data_inicial_Semana,
                            :hora_inicial_Semana,
                            :data_final_Semana,
                            :hora_final_Semana,
                            :nm_aula_Ministrada)";

            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':fk_INSTRUTOR_id_Instrutor', $ministrar->getfk_Instrutor_id_Instrutor() );
            $statement_sql->bindValue( ':fk_MUSCULACAO_id_Musculacao', $ministrar->getfk_Musculacao_id_Musculacao() );
            $statement_sql->bindValue( ':data_inicial_Semana', $ministrar->getdata_inicial_semana() );
            $statement_sql->bindValue( ':hora_inicial_Semana', $ministrar->gethora_inicial_semana() );
            $statement_sql->bindValue( ':data_final_Semana', $ministrar->getdata_final_semana() );
            $statement_sql->bindValue( ':hora_final_Semana', $ministrar->gethora_final_semana() );
            $statement_sql->bindValue( ':nm_aula_Ministrada', $ministrar->getnm_aula_Ministrada() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print 'Erro ao Inserir Ministrar <br>' . $e . '<br>';
        }
    }

    public function updateMinistrar( Ministrar $ministrar ) {
        try {
            $sql = "UPDATE MINISTRAR set
                
                fk_INSTRUTOR_id_Instrutor   = :fk_INSTRUTOR_id_Instrutor,
                fk_MUSCULACAO_id_Musculacao = :fk_MUSCULACAO_id_Musculacao,
                data_inicial_Semana         = :data_inicial_Semana,
                hora_inicial_Semana         = :hora_inicial_Semana,
                data_final_Semana           = :data_final_Semana,
                hora_final_Semana           = :hora_final_Semana,
                nm_aula_Ministrada          = :nm_aula_Ministrada
                WHERE id = :id";

            $Conexao = new Conexao();
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':fk_INSTRUTOR_id_Instrutor', $ministrar->getfk_Instrutor_id_Instrutor() );
            $statement_sql->bindValue( ':fk_MUSCULACAO_id_Musculacao', $ministrar->getfk_Musculacao_id_Musculacao() );
            $statement_sql->bindValue( ':data_inicial_Semana', $ministrar->getdata_inicial_semana() );
            $statement_sql->bindValue( ':hora_inicial_Semana', $ministrar->gethora_inicial_semana() );
            $statement_sql->bindValue( ':data_final_Semana', $ministrar->getdata_final_semana() );
            $statement_sql->bindValue( ':hora_final_Semana', $ministrar->gethora_final_semana() );
            $statement_sql->bindValue( ':nm_aula_Ministrada', $ministrar->getnm_aula_Ministrada() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete( Ministrar $ministrar ) {
        try {
            $sql = 'DELETE FROM MINISTRAR WHERE id = :id';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id', $ministrar->getid_prod_Estoque() );
            return $statement_sql->execute();
        } catch ( Exception $e ) {
            echo "Erro ao Excluir Ministrar<br> $e <br>";
        }
    }

    public function getMinistrar() {
        try {
            $sql = 'SELECT * FROM MINISTRAR order by nm_aula_Ministrada asc';
            $Conexao = new Conexao();
            $result = $Conexao->Conectar()->query( $sql );
            $lista = $result->fetchAll( PDO::FETCH_ASSOC );
            $f_lista = array();
            foreach ( $lista as $l ) {
                $f_lista[] = $this->listaMinistrar( $l );
            }
            return $f_lista;
        } catch ( Exception $e ) {
            print 'Ocorreu um erro ao tentar Buscar Todos.' . $e;
        }
    }

    private function listaMinistrar( $row ) {
        $ministrar = new Ministrar();
        $ministrar->setfk_Instrutor_id_Instrutor( $row[ 'fk_INSTRUTOR_id_Instrutor' ] );
        $ministrar->setfk_Musculacao_id_Musculacao( $row[ 'fk_MUSCULACAO_id_Musculacao' ] );
        $ministrar->setdata_inicial_semana( $row[ 'data_inicial_Semana' ] );
        $ministrar->sethora_inicial_semana( $row[ 'hora_inicial_Semana' ] );
        $ministrar->setdata_final_semana( $row[ 'data_final_Semana' ] );
        $ministrar->sethora_final_semana( $row[ 'hora_final_Semana' ] );
        $ministrar->setnm_aula_Ministrada( $row[ 'nm_aula_Ministrada' ] );

        return $ministrar;
    }

}

?>