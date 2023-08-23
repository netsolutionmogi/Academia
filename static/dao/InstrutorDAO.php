<?php
/*
Criação da classe InstrutorDAO com o CRUD
*/
require_once __DIR__ . '../../conexao/Conexao.php';
require_once __DIR__ . '../../model/Instrutor.php';

class InstrutorDAO {

    public function SalvarInstrutor( Instrutor $instrutor ) {
        try {

            if ( $_FILES[ 'img' ][ 'name' ] != '' ) {

                $tipo = explode( '.', $_FILES[ 'img' ][ 'name' ] );
                $nome_img = substr( md5( $_FILES[ 'img' ][ 'name' ] ), 0, 6 ).'.'.$tipo[ 1 ];
                $tamanho = $_FILES[ 'img' ][ 'size' ];
                $nome_temp = $_FILES[ 'img' ][ 'tmp_name' ];
                $pasta = './upload/instrutor/';

                if ( !file_exists( $pasta ) ) {
                    mkdir( $pasta, 0777 );
                }

                if ( $tipo[ 1 ] == 'jpg' || $tipo[ 1 ] == 'png'  || $tipo[ 1 ] == 'jpeg' ) {
                    move_uploaded_file( $nome_temp, $pasta.$nome_img );
                } else {
                    echo "<script>
                        alert('Não é possível cadastrar essa imagem!');
                        </script>";
                    exit;
                }
            } else {
                $nome_img = '';
            }

            $sql = "INSERT INTO tbl_instrutor(   
                nm_Instrutor,sbnm_Instrutor,foto_Instrutor,data_nasc_Instrutor,
                sexo_Instrutor,rg_Instrutor,cpf_Instrutor,login_Instrutor,senha_Instrutor,
                logra_Instrutor,num_Instrutor,compl_Instrutor,bairro_Instrutor,
                cep_Instrutor,cidade_Instrutor,email_Instrutor,tel_Instrutor)
                  VALUES (
                    :nm_Instrutor,
                    :sbnm_Instrutor,
                    :foto_Instrutor,
                    :data_nasc_Instrutor,
                    :sexo_Instrutor,
                    :rg_Instrutor,
                    :cpf_Instrutor,
                    :login_Instrutor,
                    :senha_Instrutor,
                    :logra_Instrutor,
                    :num_Instrutor,
                    :compl_Instrutor,
                    :bairro_Instrutor,
                    :cep_Instrutor,
                    :cidade_Instrutor,
                    :email_Instrutor,
                    :tel_Instrutor)";

            $Conexao = new Conexao();
            date_default_timezone_set( 'America/Sao_Paulo' );
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':nm_Instrutor', $instrutor->getnmInstrutor() );
            $statement_sql->bindValue( ':sbnm_Instrutor', $instrutor->getsbnmInstrutor() );
            $statement_sql->bindValue( ':foto_Instrutor', $nome_img );
            $statement_sql->bindValue( ':data_nasc_Instrutor', $instrutor->getdata_nasc_Instrutor() );
            $statement_sql->bindValue( ':sexo_Instrutor', $instrutor->getsexo_Instrutor() );
            $statement_sql->bindValue( ':rg_Instrutor', $instrutor->getrg_Instrutor() );
            $statement_sql->bindValue( ':cpf_Instrutor', $instrutor->getcpf_Instrutor() );
            $statement_sql->bindValue( ':login_Instrutor', $instrutor->getLoginInstrutor() );
            $statement_sql->bindValue( ':senha_Instrutor', $instrutor->getSenhaInstrutor() );
            $statement_sql->bindValue( ':logra_Instrutor', $instrutor->getlogra_Instrutor() );
            $statement_sql->bindValue( ':num_Instrutor', $instrutor->getnum_Instrutor() );
            $statement_sql->bindValue( ':compl_Instrutor', $instrutor->getcompl_Instrutor() );
            $statement_sql->bindValue( ':bairro_Instrutor', $instrutor->getbairro_Instrutor() );
            $statement_sql->bindValue( ':cep_Instrutor', $instrutor->getcep_Instrutor() );
            $statement_sql->bindValue( ':cidade_Instrutor', $instrutor->getcidade_Instrutor() );
            $statement_sql->bindValue( ':email_Instrutor', $instrutor->getemail_Instrutor() );
            $statement_sql->bindValue( ':tel_Instrutor', $instrutor->gettel_Instrutor() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print 'Erro ao Inserir Instrutor <br>' . $e . '<br>';
        }
    }

    public function updateInstrutor( Instrutor $instrutor ) {
        try {

            if ( $_FILES[ 'img' ][ 'name' ] != '' ) {

                $tipo = explode( '.', $_FILES[ 'img' ][ 'name' ] );
                $nome_img = substr( md5( $_FILES[ 'img' ][ 'name' ] ), 0, 6 ).'.'.$tipo[ 1 ];
                $tamanho = $_FILES[ 'img' ][ 'size' ];
                $nome_temp = $_FILES[ 'img' ][ 'tmp_name' ];
                $pasta = './upload/instrutor/';

                if ( !file_exists( $pasta ) ) {
                    mkdir( $pasta, 0777 );
                }

                if ( $tipo[ 1 ] == 'jpg' || $tipo[ 1 ] == 'png'  || $tipo[ 1 ] == 'jpeg' ) {
                    move_uploaded_file( $nome_temp, $pasta.$nome_img );
                } else {
                    echo "<script>
                        alert('Não é possível cadastrar essa imagem!');
                        </script>";
                    exit;
                }
            } else {
                $nome_img = '';
            }

            $sql = "UPDATE tbl_instrutor set
                
                nm_Instrutor        = :nm_Instrutor,
                sbnm_Instrutor      = :sbnm_Instrutor,
                data_nasc_Instrutor = :data_nasc_Instrutor,
                sexo_Instrutor      = :sexo_Instrutor,
                rg_Instrutor        = :rg_Instrutor,
                cpf_Instrutor       = :cpf_Instrutor,
                login_Instrutor     = :login_Instrutor,
                senha_Instrutor     = :senha_Instrutor,
                logra_Instrutor     = :logra_Instrutor,
                num_Instrutor       = :num_Instrutor,
                compl_Instrutor     = :compl_Instrutor,
                bairro_Instrutor    = :bairro_Instrutor,
                cep_Instrutor       = :cep_Instrutor,
                foto_Instrutor      = :foto_Instrutor,
                cidade_Instrutor    = :cidade_Instrutor,
                email_Instrutor     = :email_Instrutor,
                tel_Instrutor       = :tel_Instrutor
                WHERE id_Instrutor = :id_Instrutor";

            $Conexao = new Conexao();
            date_default_timezone_set( 'America/Sao_Paulo' );
            //$Data_Cadastro = date( 'Y-m-d' );
            //$Hora_Cadastro = date( 'H:i:s', time() );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Instrutor', $instrutor->getid_Instrutor() );
            $statement_sql->bindValue( ':nm_Instrutor', $instrutor->getnmInstrutor() );
            $statement_sql->bindValue( ':sbnm_Instrutor', $instrutor->getsbnmInstrutor() );
            $statement_sql->bindValue( ':foto_Instrutor', $nome_img );
            $statement_sql->bindValue( ':data_nasc_Instrutor', $instrutor->getdata_nasc_Instrutor() );
            $statement_sql->bindValue( ':sexo_Instrutor', $instrutor->getsexo_Instrutor() );
            $statement_sql->bindValue( ':rg_Instrutor', $instrutor->getrg_Instrutor() );
            $statement_sql->bindValue( ':cpf_Instrutor', $instrutor->getcpf_Instrutor() );
            $statement_sql->bindValue( ':login_Instrutor', $instrutor->getLoginInstrutor() );
            $statement_sql->bindValue( ':senha_Instrutor', $instrutor->getSenhaInstrutor() );
            $statement_sql->bindValue( ':logra_Instrutor', $instrutor->getlogra_Instrutor() );
            $statement_sql->bindValue( ':num_Instrutor', $instrutor->getnum_Instrutor() );
            $statement_sql->bindValue( ':compl_Instrutor', $instrutor->getcompl_Instrutor() );
            $statement_sql->bindValue( ':bairro_Instrutor', $instrutor->getbairro_Instrutor() );
            $statement_sql->bindValue( ':cep_Instrutor', $instrutor->getcep_Instrutor() );
            $statement_sql->bindValue( ':cidade_Instrutor', $instrutor->getcidade_Instrutor() );
            $statement_sql->bindValue( ':email_Instrutor', $instrutor->getemail_Instrutor() );
            $statement_sql->bindValue( ':tel_Instrutor', $instrutor->gettel_Instrutor() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function deleteInstrutor( Instrutor $instrutor ) {
        try {
            $sql = 'DELETE FROM tbl_instrutor WHERE id_Instrutor = :id_Instrutor';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Instrutor', $instrutor->getid_Instrutor() );
            return $statement_sql->execute();
        } catch ( Exception $e ) {
            echo "Erro ao Excluir Instrutor<br> $e <br>";
        }
    }

    public function getInstrutor() {
        try {
            $sql = 'SELECT * FROM tbl_instrutor order by nm_Instrutor asc';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->query( $sql );
            $resultado = array();
            while ( $row = $statement_sql->fetch( PDO::FETCH_ASSOC ) ) {
                $instrutor = new Instrutor();
                $instrutor->setid_Instrutor( $row[ 'id_Instrutor' ] ) ;
                $instrutor->setnm_Instrutor( $row[ 'nm_Instrutor' ] );
                $instrutor->setsbnm_Instrutor( $row[ 'sbnm_Instrutor' ] );
                $instrutor->setlogin_Instrutor( $row[ 'login_Instrutor' ] );
                $instrutor->setrg_Instrutor( $row[ 'rg_Instrutor' ] ) ;
                $instrutor->setemail_Instrutor( $row[ 'email_Instrutor' ] ) ;
                $instrutor->settel_Instrutor( $row[ 'tel_Instrutor' ] ) ;
                $instrutor->setlogra_Instrutor( $row[ 'logra_Instrutor' ] );
                $instrutor->setnum_Instrutor( $row[ 'num_Instrutor' ] );
                $instrutor->setcompl_Instrutor( $row[ 'compl_Instrutor' ] );
                $instrutor->setcidade_Instrutor( $row[ 'cidade_Instrutor' ] );
                $instrutor->setcep_Instrutor( $row[ 'cep_Instrutor' ] );
                $instrutor->setsenha_Instrutor( $row[ 'senha_Instrutor' ] );
                $instrutor->setsexo_Instrutor( $row[ 'sexo_Instrutor' ] );
                $instrutor->setcpf_Instrutor( $row[ 'cpf_Instrutor' ] );
                $instrutor->setfoto_Instrutor( $row[ 'foto_Instrutor' ] );
                $instrutor->setbairro_Instrutor( $row[ 'bairro_Instrutor' ] );
                $instrutor->setdata_nasc_Instrutor( $row[ 'data_nasc_Instrutor' ] );
                $resultado[] = $instrutor;
            }
            return $resultado;
        } catch ( Exception $e ) {
            print 'Ocorreu um erro ao tentar Buscar Todos.' . $e;
        }
    }

    public function ProcurarInstrutorPorCodigo( Instrutor $instrutor ) {

        try {
            $sql = 'select * from tbl_instrutor where id_Instrutor = :id_Instrutor';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Instrutor', $instrutor->getid_Instrutor() );
            $statement_sql->execute();
            $row =  $statement_sql->fetch( PDO::FETCH_ASSOC ) ;
            if ( $statement_sql ) {
                $instrutor = new Instrutor();
                $instrutor->setid_Instrutor( $row[ 'id_Instrutor' ] ) ;
                $instrutor->setnm_Instrutor( $row[ 'nm_Instrutor' ] );
                $instrutor->setsbnm_Instrutor( $row[ 'sbnm_Instrutor' ] );
                $instrutor->setlogin_Instrutor( $row[ 'login_Instrutor' ] );
                $instrutor->setrg_Instrutor( $row[ 'rg_Instrutor' ] ) ;
                $instrutor->setemail_Instrutor( $row[ 'email_Instrutor' ] ) ;
                $instrutor->settel_Instrutor( $row[ 'tel_Instrutor' ] ) ;
                $instrutor->setlogra_Instrutor( $row[ 'logra_Instrutor' ] );
                $instrutor->setnum_Instrutor( $row[ 'num_Instrutor' ] );
                $instrutor->setcompl_Instrutor( $row[ 'compl_Instrutor' ] );
                $instrutor->setcidade_Instrutor( $row[ 'cidade_Instrutor' ] );
                $instrutor->setcep_Instrutor( $row[ 'cep_Instrutor' ] );
                $instrutor->setsenha_Instrutor( $row[ 'senha_Instrutor' ] );
                $instrutor->setsexo_Instrutor( $row[ 'sexo_Instrutor' ] );
                $instrutor->setcpf_Instrutor( $row[ 'cpf_Instrutor' ] );
                $instrutor->setfoto_Instrutor( $row[ 'foto_Instrutor' ] );
                $instrutor->setbairro_Instrutor( $row[ 'bairro_Instrutor' ] );
                $instrutor->setdata_nasc_Instrutor( $row[ 'data_nasc_Instrutor' ] );
            }
            return $instrutor;
            //$statement_sql->debugDumpParams();

        } catch ( PDOException $exc ) {
            print 'Erro :: ' . $exc->getMessage();
        }
    }

    public function paginacao_Instrutor( $inicio, $registros ) {

        try {
            $condition  =   '';
            if ( isset( $_POST[ 'search' ] ) and $_POST[ 'search' ] != '' ) {
                $condition  .=  'Where nm_Instrutor LIKE :search ';
            }
            $sql = 'select * from tbl_instrutor '.$condition." LIMIT $inicio, $registros";
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
                $instrutor = new Instrutor();
                $instrutor->setid_Instrutor( $row[ 'id_Instrutor' ] ) ;
                $instrutor->setnm_Instrutor( $row[ 'nm_Instrutor' ] );
                $instrutor->setsbnm_Instrutor( $row[ 'sbnm_Instrutor' ] );
                $instrutor->setlogin_Instrutor( $row[ 'login_Instrutor' ] );
                $instrutor->setrg_Instrutor( $row[ 'rg_Instrutor' ] ) ;
                $instrutor->setemail_Instrutor( $row[ 'email_Instrutor' ] ) ;
                $instrutor->settel_Instrutor( $row[ 'tel_Instrutor' ] ) ;
                $instrutor->setlogra_Instrutor( $row[ 'logra_Instrutor' ] );
                $instrutor->setnum_Instrutor( $row[ 'num_Instrutor' ] );
                $instrutor->setcompl_Instrutor( $row[ 'compl_Instrutor' ] );
                $instrutor->setcidade_Instrutor( $row[ 'cidade_Instrutor' ] );
                $instrutor->setcep_Instrutor( $row[ 'cep_Instrutor' ] );
                $instrutor->setsenha_Instrutor( $row[ 'senha_Instrutor' ] );
                $instrutor->setsexo_Instrutor( $row[ 'sexo_Instrutor' ] );
                $instrutor->setcpf_Instrutor( $row[ 'cpf_Instrutor' ] );
                $instrutor->setfoto_Instrutor( $row[ 'foto_Instrutor' ] );
                $instrutor->setbairro_Instrutor( $row[ 'bairro_Instrutor' ] );
                $instrutor->setdata_nasc_Instrutor( $row[ 'data_nasc_Instrutor' ] );
                $resultado[] = $instrutor;
            }
            return $resultado;
        } catch ( PDOException $e ) {
            print ' Erro em m_paginacao_cliente ' . $e->getMessage();
        }
    }

    public function logarInstrutor( Instrutor $instrutor ) {
        try {
            $sql = 'select * from tbl_instrutor where login_Instrutor = :login AND senha_Instrutor =:senha';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':login', $instrutor->getLoginInstrutor() );
            $statement_sql->bindValue( ':senha', $instrutor->getSenhaInstrutor() );
            $statement_sql->execute();
            $row = $statement_sql->fetch( PDO::FETCH_ASSOC );
            //$statement_sql->debugDumpParams();
            if ( $statement_sql->rowCount() > 0 ) {
                ob_start();
                session_start();

                $_SESSION[ 'id_Instrutor' ]    = $row[ 'id_Instrutor' ];
                $_SESSION[ 'login_Instrutor' ] = $row[ 'login_Instrutor' ];
                $_SESSION[ 'senha_Instrutor' ] = $row[ 'senha_Instrutor' ];
                $_SESSION[ 'foto_Instrutor' ]    = $row [ 'foto_Instrutor' ];
                $_SESSION[ 'logado' ] = 'sim';
                $_SESSION[ 'Instrutor' ] = 'Instrutor';

                header( 'Location: index.php' );

            } else {
                $_SESSION[ 'loginErro' ] = 'Usuário ou Senha inválido!';
                header( 'location: loginProfessor.php' );
            }

        } catch ( PDOException $exc ) {
            print 'Erro :: ' . $exc->getMessage();
        }
    }

    public function sairInstrutor() {
        session_start();
        session_destroy();
        header( 'location: loginProfessor.php' );
    }

}

?>