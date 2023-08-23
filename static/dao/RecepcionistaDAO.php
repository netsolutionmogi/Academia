<?php
/*
Criação da classe RecepcionistaDAO com o CRUD
*/
require_once __DIR__ . '../../conexao/Conexao.php';
require_once __DIR__ . '../../model/Recepcionista.php';

class RecepcionistaDAO {

    public function SalvarRecepcionista( Recepcionista $recepcionista ) {
        try {

            if ( $_FILES[ 'img' ][ 'name' ] != '' ) {

                $tipo = explode( '.', $_FILES[ 'img' ][ 'name' ] );
                $nome_img = substr( md5( $_FILES[ 'img' ][ 'name' ] ), 0, 6 ).'.'.$tipo[ 1 ];
                $tamanho = $_FILES[ 'img' ][ 'size' ];
                $nome_temp = $_FILES[ 'img' ][ 'tmp_name' ];
                $pasta = './upload/Recepcionista/';

                if ( !file_exists( $pasta ) ) {
                    mkdir( $pasta, 0777 );
                }

                if ( $tipo[ 1 ] == 'jpg' || $tipo[ 1 ] == 'png' || $tipo[ 1 ] == 'jpeg' ) {
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

            $sql = "INSERT INTO tbl_recepcionista(  
                nm_Recepcionista,sbnm_Recepcionista,foto_Recepcionista,
                data_nasc_Recepcionista,sexo_Recepcionista, rg_Recepcionista, cpf_Recepcionista,
                login_Recepcionista,senha_Recepcionista, logra_Recepcionista, num_Recepcionista,
                compl_Recepcionista,bairro_Recepcionista, cep_Recepcionista, cidade_Recepcionista,
                email_Recepcionista,tel_Recepcionista)
                  VALUES (
                    :nm_Recepcionista,
                    :sbnm_Recepcionista,
                    :foto_Recepcionista,
                    :data_nasc_Recepcionista,
                    :sexo_Recepcionista,
                    :rg_Recepcionista,
                    :cpf_Recepcionista,
                    :login_Recepcionista,
                    :senha_Recepcionista,
                    :logra_Recepcionista,
                    :num_Recepcionista,
                    :compl_Recepcionista,
                    :bairro_Recepcionista,
                    :cep_Recepcionista,
                    :cidade_Recepcionista,
                    :email_Recepcionista,
                    :tel_Recepcionista)";

            $Conexao = new Conexao();
            date_default_timezone_set( 'America/Sao_Paulo' );
            $Data_Cadastro = date( 'Y-m-d' );
            $Hora_Cadastro = date( 'H:i:s', time() );

            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':nm_Recepcionista', $recepcionista->getnmRecepcionista() );
            $statement_sql->bindValue( ':sbnm_Recepcionista', $recepcionista->getsbnmRecepcionista() );
            $statement_sql->bindValue( ':foto_Recepcionista', $nome_img );
            $statement_sql->bindValue( ':data_nasc_Recepcionista', $recepcionista->getdata_nasc_Recepcionista() );
            $statement_sql->bindValue( ':sexo_Recepcionista', $recepcionista->getsexo_Recepcionista() );
            $statement_sql->bindValue( ':rg_Recepcionista', $recepcionista->getrg_Recepcionista() );
            $statement_sql->bindValue( ':cpf_Recepcionista', $recepcionista->getcpf_Recepcionista() );
            $statement_sql->bindValue( ':login_Recepcionista', $recepcionista->getLoginRecepcionista() );
            $statement_sql->bindValue( ':senha_Recepcionista', $recepcionista->getSenhaRecepcionista() );
            $statement_sql->bindValue( ':logra_Recepcionista', $recepcionista->getlogra_Recepcionista() );
            $statement_sql->bindValue( ':num_Recepcionista', $recepcionista->getnum_Recepcionista() );
            $statement_sql->bindValue( ':compl_Recepcionista', $recepcionista->getcompl_Recepcionista() );
            $statement_sql->bindValue( ':bairro_Recepcionista', $recepcionista->getbairro_Recepcionista() );
            $statement_sql->bindValue( ':cep_Recepcionista', $recepcionista->getcep_Recepcionista() );
            $statement_sql->bindValue( ':cidade_Recepcionista', $recepcionista->getcidade_Recepcionista() );
            $statement_sql->bindValue( ':email_Recepcionista', $recepcionista->getemail_Recepcionista() );
            $statement_sql->bindValue( ':tel_Recepcionista', $recepcionista->gettel_Recepcionista() );
            //$statement_sql->bindValue( ':data_cad_Recepcionista', $Data_Cadastro );
            return $statement_sql->execute();

        } catch ( Exception $e ) {
            print 'Erro ao Inserir Recepcionista <br>' . $e . '<br>';
        }
    }

    public function updateRecepcionista( Recepcionista $recepcionista ) {
        try {

            if ( $_FILES[ 'img' ][ 'name' ] != '' ) {

                $tipo = explode( '.', $_FILES[ 'img' ][ 'name' ] );
                $nome_img = substr( md5( $_FILES[ 'img' ][ 'name' ] ), 0, 6 ).'.'.$tipo[ 1 ];
                $tamanho = $_FILES[ 'img' ][ 'size' ];
                $nome_temp = $_FILES[ 'img' ][ 'tmp_name' ];
                $pasta = './upload/Recepcionista/';

                if ( !file_exists( $pasta ) ) {
                    mkdir( $pasta, 0777 );
                }

                if ( $tipo[ 1 ] == 'jpg' || $tipo[ 1 ] == 'png' || $tipo[ 1 ] == 'jpeg' ) {
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

            $sql = "UPDATE tbl_recepcionista set
                
                nm_Recepcionista         = :nm_Recepcionista,
                sbnm_Recepcionista       = :sbnm_Recepcionista,
                foto_Recepcionista       = :foto_Recepcionista,
                data_nasc_Recepcionista  = :data_nasc_Recepcionista,
                sexo_Recepcionista       = :sexo_Recepcionista,
                rg_Recepcionista         = :rg_Recepcionista,
                cpf_Recepcionista        = :cpf_Recepcionista,
                login_Recepcionista      = :login_Recepcionista,
                senha_Recepcionista      = :senha_Recepcionista,
                logra_Recepcionista      = :logra_Recepcionista,
                num_Recepcionista        = :num_Recepcionista,
                compl_Recepcionista      = :compl_Recepcionista,
                bairro_Recepcionista     = :bairro_Recepcionista,
                cep_Recepcionista        = :cep_Recepcionista,
                cidade_Recepcionista     = :cidade_Recepcionista,
                email_Recepcionista      = :email_Recepcionista,
                tel_Recepcionista        = :tel_Recepcionista
                  WHERE id_Recepcionista = :id_Recepcionista";

            $Conexao = new Conexao();
            date_default_timezone_set( 'America/Sao_Paulo' );
            $Data_Cadastro = date( 'Y-m-d' );
            $Hora_Cadastro = date( 'H:i:s', time() );

            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Recepcionista', $recepcionista->getid_Recepcionista() );
            $statement_sql->bindValue( ':nm_Recepcionista', $recepcionista->getnmRecepcionista() );
            $statement_sql->bindValue( ':sbnm_Recepcionista', $recepcionista->getsbnmRecepcionista() );
            $statement_sql->bindValue( ':foto_Recepcionista', $nome_img );
            $statement_sql->bindValue( ':data_nasc_Recepcionista', $recepcionista->getdata_nasc_Recepcionista() );
            $statement_sql->bindValue( ':sexo_Recepcionista', $recepcionista->getsexo_Recepcionista() );
            $statement_sql->bindValue( ':rg_Recepcionista', $recepcionista->getrg_Recepcionista() );
            $statement_sql->bindValue( ':cpf_Recepcionista', $recepcionista->getcpf_Recepcionista() );
            $statement_sql->bindValue( ':login_Recepcionista', $recepcionista->getLoginRecepcionista() );
            $statement_sql->bindValue( ':senha_Recepcionista', $recepcionista->getSenhaRecepcionista() );
            $statement_sql->bindValue( ':logra_Recepcionista', $recepcionista->getlogra_Recepcionista() );
            $statement_sql->bindValue( ':num_Recepcionista', $recepcionista->getnum_Recepcionista() );
            $statement_sql->bindValue( ':compl_Recepcionista', $recepcionista->getcompl_Recepcionista() );
            $statement_sql->bindValue( ':bairro_Recepcionista', $recepcionista->getbairro_Recepcionista() );
            $statement_sql->bindValue( ':cep_Recepcionista', $recepcionista->getcep_Recepcionista() );
            $statement_sql->bindValue( ':cidade_Recepcionista', $recepcionista->getcidade_Recepcionista() );
            $statement_sql->bindValue( ':email_Recepcionista', $recepcionista->getemail_Recepcionista() );
            $statement_sql->bindValue( ':tel_Recepcionista', $recepcionista->gettel_Recepcionista() );
            //$statement_sql->bindValue( ':data_cad_Recepcionista', $Data_Cadastro );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function deleteRecepcionista( Recepcionista $recepcionista ) {
        try {
            $sql = 'DELETE FROM tbl_recepcionista WHERE id_Recepcionista = :id_Recepcionista';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Recepcionista', $recepcionista->getid_Recepcionista() );
            return $statement_sql->execute();
        } catch ( Exception $e ) {
            echo "Erro ao Excluir Instrutor<br> $e <br>";
        }
    }

    public function getRecepcionista() {
        try {
            $sql = 'SELECT * FROM tbl_recepcionista order by nm_recepcionista asc';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->query( $sql );
            $resultado = array();
            while ( $row = $statement_sql->fetch( PDO::FETCH_ASSOC ) ) {
                $recepcionista = new Recepcionista();
                $recepcionista->setid_Recepcionista( $row[ 'id_Recepcionista' ] ) ;
                $recepcionista->setnm_Recepcionista( $row[ 'nm_Recepcionista' ] );
                $recepcionista->setsbnm_Recepcionista( $row[ 'sbnm_Recepcionista' ] );
                $recepcionista->setlogin_Recepcionista( $row[ 'login_Recepcionista' ] );
                $recepcionista->setrg_Recepcionista( $row[ 'rg_Recepcionista' ] ) ;
                $recepcionista->setemail_Recepcionista( $row[ 'email_Recepcionista' ] ) ;
                $recepcionista->settel_Recepcionista( $row[ 'tel_Recepcionista' ] ) ;
                $recepcionista->setlogra_Recepcionista( $row[ 'logra_Recepcionista' ] );
                $recepcionista->setnum_Recepcionista( $row[ 'num_Recepcionista' ] );
                $recepcionista->setcompl_Recepcionista( $row[ 'compl_Recepcionista' ] );
                $recepcionista->setcidade_Recepcionista( $row[ 'cidade_Recepcionista' ] );
                $recepcionista->setcep_Recepcionista( $row[ 'cep_Recepcionista' ] );
                $recepcionista->setsenha_Recepcionista( $row[ 'senha_Recepcionista' ] );
                $recepcionista->setsexo_Recepcionista( $row[ 'sexo_Recepcionista' ] );
                $recepcionista->setfoto_Recepcionista( $row[ 'foto_Recepcionista' ] );
                $recepcionista->setcpf_Recepcionista( $row[ 'cpf_Recepcionista' ] );
                $recepcionista->setbairro_Recepcionista( $row[ 'bairro_Recepcionista' ] );
                $recepcionista->setdata_nasc_Recepcionista( $row[ 'data_nasc_Recepcionista' ] );
                $resultado[] = $recepcionista;
            }
            return $resultado;
        } catch ( Exception $e ) {
            print 'Ocorreu um erro ao tentar Buscar Todos.' . $e;
        }
    }

    public function ProcurarRecepcionistaPorCodigo( Recepcionista $recepcionista ) {

        try {
            $sql = 'select * from tbl_recepcionista where id_Recepcionista = :id_Recepcionista';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Recepcionista', $recepcionista->getid_Recepcionista() );
            $statement_sql->execute();
            $row =  $statement_sql->fetch( PDO::FETCH_ASSOC ) ;
            if ( $statement_sql ) {
                $recepcionista = new Recepcionista();
                $recepcionista->setid_Recepcionista( $row[ 'id_Recepcionista' ] ) ;
                $recepcionista->setnm_Recepcionista( $row[ 'nm_Recepcionista' ] );
                $recepcionista->setsbnm_Recepcionista( $row[ 'sbnm_Recepcionista' ] );
                $recepcionista->setlogin_Recepcionista( $row[ 'login_Recepcionista' ] );
                $recepcionista->setrg_Recepcionista( $row[ 'rg_Recepcionista' ] ) ;
                $recepcionista->setemail_Recepcionista( $row[ 'email_Recepcionista' ] ) ;
                $recepcionista->settel_Recepcionista( $row[ 'tel_Recepcionista' ] ) ;
                $recepcionista->setlogra_Recepcionista( $row[ 'logra_Recepcionista' ] );
                $recepcionista->setnum_Recepcionista( $row[ 'num_Recepcionista' ] );
                $recepcionista->setcompl_Recepcionista( $row[ 'compl_Recepcionista' ] );
                $recepcionista->setcidade_Recepcionista( $row[ 'cidade_Recepcionista' ] );
                $recepcionista->setcep_Recepcionista( $row[ 'cep_Recepcionista' ] );
                $recepcionista->setsenha_Recepcionista( $row[ 'senha_Recepcionista' ] );
                $recepcionista->setsexo_Recepcionista( $row[ 'sexo_Recepcionista' ] );
                $recepcionista->setfoto_Recepcionista( $row[ 'foto_Recepcionista' ] );
                $recepcionista->setcpf_Recepcionista( $row[ 'cpf_Recepcionista' ] );
                $recepcionista->setbairro_Recepcionista( $row[ 'bairro_Recepcionista' ] );
                $recepcionista->setdata_nasc_Recepcionista( $row[ 'data_nasc_Recepcionista' ] );
            }
            return $recepcionista;
            //$statement_sql->debugDumpParams();

        } catch ( PDOException $exc ) {
            print 'Erro em M_buscaProdutoPorCodigo :: ' . $exc->getMessage();
        }
    }

    public function paginacao_Recepcionista( $inicio, $registros ) {

        try {
            $condition  =   '';
            if ( isset( $_POST[ 'search' ] ) and $_POST[ 'search' ] != '' ) {
                $condition  .=  'Where nm_Recepcionista LIKE :search ';
            }
            $sql = 'select * from tbl_recepcionista '.$condition."  LIMIT $inicio, $registros";
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
                    $recepcionista = new Recepcionista();
                    $recepcionista->setid_Recepcionista( $row[ 'id_Recepcionista' ] ) ;
                    $recepcionista->setnm_Recepcionista( $row[ 'nm_Recepcionista' ] );
                    $recepcionista->setsbnm_Recepcionista( $row[ 'sbnm_Recepcionista' ] );
                    $recepcionista->setlogin_Recepcionista( $row[ 'login_Recepcionista' ] );
                    $recepcionista->setrg_Recepcionista( $row[ 'rg_Recepcionista' ] ) ;
                    $recepcionista->setemail_Recepcionista( $row[ 'email_Recepcionista' ] ) ;
                    $recepcionista->settel_Recepcionista( $row[ 'tel_Recepcionista' ] ) ;
                    $recepcionista->setlogra_Recepcionista( $row[ 'logra_Recepcionista' ] );
                    $recepcionista->setnum_Recepcionista( $row[ 'num_Recepcionista' ] );
                    $recepcionista->setcompl_Recepcionista( $row[ 'compl_Recepcionista' ] );
                    $recepcionista->setcidade_Recepcionista( $row[ 'cidade_Recepcionista' ] );
                    $recepcionista->setcep_Recepcionista( $row[ 'cep_Recepcionista' ] );
                    $recepcionista->setsenha_Recepcionista( $row[ 'senha_Recepcionista' ] );
                    $recepcionista->setsexo_Recepcionista( $row[ 'sexo_Recepcionista' ] );
                    $recepcionista->setfoto_Recepcionista( $row[ 'foto_Recepcionista' ] );
                    $recepcionista->setcpf_Recepcionista( $row[ 'cpf_Recepcionista' ] );
                    $recepcionista->setbairro_Recepcionista( $row[ 'bairro_Recepcionista' ] );
                    $recepcionista->setdata_nasc_Recepcionista( $row[ 'data_nasc_Recepcionista' ] );
                    $resultado[] = $recepcionista;
                }
            }
            return $resultado;
        } catch ( PDOException $e ) {
            print ' Erro ' . $e->getMessage();
        }
    }

    public function logarRecepcionista( Recepcionista $recepcionista ) {
        try {
            $sql = 'select * from tbl_recepcionista where login_Recepcionista = :login AND senha_Recepcionista =:senha';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':login', $recepcionista->getLoginRecepcionista() );
            $statement_sql->bindValue( ':senha', $recepcionista->getSenhaRecepcionista() );
            $statement_sql->execute();
            $row = $statement_sql->fetch( PDO::FETCH_ASSOC );
            //$statement_sql->debugDumpParams();
            if ( $statement_sql->rowCount() > 0 ) {
                ob_start();
                session_start();

                $_SESSION[ 'id_Recepcionista' ]    = $row[ 'id_Recepcionista' ];
                $_SESSION[ 'login_Recepcionista' ] = $row[ 'login_Recepcionista' ];
                $_SESSION[ 'senha_Recepcionista' ] = $row[ 'senha_Recepcionista' ];
                $_SESSION[ 'foto_Recepcionista' ]   = $row[ 'foto_Recepcionista' ] ;
                $_SESSION[ 'logado' ] = 'sim';
                $_SESSION[ 'Recepcionista' ] = 'Recepcionista';

                header( 'Location: index.php' );

            } else {
                $_SESSION[ 'loginErro' ] = 'Usuário ou Senha inválido!';
                header( 'location: loginRecepcionista.php' );
            }

        } catch ( PDOException $exc ) {
            print 'Erro :: ' . $exc->getMessage();
        }
    }

    public function sairRecepcionista() {
        session_start();
        session_destroy();
        header( 'location: login.php' );
    }

    private function listaRecepcionistas( $row ) {
        $recepcionista = new Recepcionista();
        $recepcionista->setid_Recepcionista( $row[ 'id_Recepcionista' ] ) ;
        $recepcionista->setnm_Recepcionista( $row[ 'num_Recepcionista' ] );
        $recepcionista->setsbnm_Recepcionista( $row[ 'sbnm_Recepcionista' ] );
        $recepcionista->setlogin_Recepcionista( $row[ 'login_Recepcionista' ] );
        $recepcionista->setrg_Recepcionista( $row[ 'rg_Recepcionista' ] ) ;
        $recepcionista->setemail_Recepcionista( $row[ 'email_Recepcionista' ] ) ;
        $recepcionista->settel_Recepcionista( $row[ 'tel_Recepcionista' ] ) ;
        $recepcionista->setlogra_Recepcionista( $row[ 'logra_Recepcionista' ] );
        $recepcionista->setnum_Recepcionista( $row[ 'num_Recepcionista' ] );
        $recepcionista->setcompl_Recepcionista( $row[ 'compl_Recepcionista' ] );
        $recepcionista->setcidade_Recepcionista( $row[ 'cidade_Recepcionista' ] );
        $recepcionista->setcep_Recepcionista( $row[ 'cep_Recepcionista' ] );
        $recepcionista->setsenha_Recepcionista( $row[ 'senha_Recepcionista' ] );
        $recepcionista->setsexo_Recepcionista( $row[ 'sexo_Recepcionista' ] );
        $recepcionista->setfoto_Recepcionista( $row[ 'foto_Recepcionista' ] );
        $recepcionista->setcpf_Recepcionista( $row[ 'cpf_Recepcionista' ] );
        $recepcionista->setbairro_Recepcionista( $row[ 'bairro_Recepcionista' ] );
        $recepcionista->setdata_nasc_Recepcionista( $row[ 'data_nasc_Recepcionista' ] );
        return $recepcionista;
    }

}

?>