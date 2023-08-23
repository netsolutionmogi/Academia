<?php
/*
Criação da classe AlunosDAO com o CRUD
*/
require_once __DIR__ . '../../conexao/Conexao.php';
require_once __DIR__ . '../../model/Alunos.php';
require_once __DIR__ . '../../controller/AlunosController.php';

class AlunosDAO {

    public function SalvarAlunos( Aluno $aluno ) {
        try {

            $sql = "INSERT INTO tbl_aluno(                   
                  login_Aluno,senha_Aluno,nm_Aluno,sbnm_Aluno,foto_Aluno,rg_Aluno,
                    tel_Aluno,email_Aluno,hora_cad_Aluno,sexo_Aluno,
                    data_cad_Aluno,data_nasc_Aluno)
                  VALUES (
                    :login_Aluno,
                    :senha_Aluno,
                    :nm_Aluno,
                    :sbnm_Aluno,
                    :foto_Aluno,
                    :rg_Aluno,
                    :tel_Aluno,
                    :email_Aluno,
                    :hora_cad_Aluno,
                    :sexo_Aluno,
                    :data_cad_Aluno,
                    :data_nasc_Aluno)";

            $Conexao = new Conexao();
            $Data_Cadastro = date( 'Y-m-d' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':login_Aluno', $aluno->getLoginAluno() );
            $statement_sql->bindValue( ':senha_Aluno', $aluno->getSenhaAluno() );
            $statement_sql->bindValue( ':nm_Aluno', $aluno->getnmAluno() );
            $statement_sql->bindValue( ':sbnm_Aluno', $aluno->getsbnmAluno() );
            $statement_sql->bindValue( ':foto_Aluno', $aluno->getfoto_Aluno() );
            $statement_sql->bindValue( ':rg_Aluno', $aluno->getrg_Aluno() );
            $statement_sql->bindValue( ':tel_Aluno', $aluno->gettel_Aluno() );
            $statement_sql->bindValue( ':email_Aluno', $aluno->getemail_Aluno() );
            $statement_sql->bindValue( ':hora_cad_Aluno', time() );
            $statement_sql->bindValue( ':sexo_Aluno', $aluno->getsexo() );
            $statement_sql->bindValue( ':data_cad_Aluno', $Data_Cadastro );
            $statement_sql->bindValue( ':data_nasc_Aluno', $aluno->getdata_nasc_aluno() );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print 'Erro ao Inserir usuario <br>' . $e . '<br>';
        }
    }

    public function SalvarFoto( Aluno $aluno ) {

        try {

            if ( $_FILES[ 'img' ][ 'name' ] != '' ) {

                $tipo = explode( '.', $_FILES[ 'img' ][ 'name' ] );
                $nome_img = substr( md5( $_FILES[ 'img' ][ 'name' ] ), 0, 6 ).'.'.$tipo[ 1 ];
                $tamanho = $_FILES[ 'img' ][ 'size' ];
                $nome_temp = $_FILES[ 'img' ][ 'tmp_name' ];
                $pasta = './upload/image/';

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

            $sql = "INSERT INTO tbl_aluno(                   
                    login_Aluno,senha_Aluno,nm_Aluno,sbnm_Aluno,foto_Aluno,sexo_Aluno,
                    data_nasc_Aluno,rg_Aluno,tel_Aluno,email_Aluno,data_cad_Aluno)
                  VALUES (
                    :login_Aluno,
                    :senha_Aluno,
                    :nm_Aluno,
                    :sbnm_Aluno,
                    :foto_Aluno,
                    :sexo_Aluno,
                    :data_nasc_Aluno,
                    :rg_Aluno,
                    :tel_Aluno,
                    :email_Aluno,
                    :data_cad_Aluno)";

            $Conexao = new Conexao();
            date_default_timezone_set( 'America/Sao_Paulo' );
            $Data_Cadastro = date( 'Y-m-d H:i:s' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':login_Aluno', $aluno->getLoginAluno() );
            $statement_sql->bindValue( ':senha_Aluno', $aluno->getSenhaAluno() );
            $statement_sql->bindValue( ':nm_Aluno', $aluno->getnmAluno() );
            $statement_sql->bindValue( ':sbnm_Aluno', $aluno->getsbnmAluno() );
            $statement_sql->bindValue( ':foto_Aluno', $nome_img );
            $statement_sql->bindValue( ':data_nasc_Aluno', $aluno->getdata_nasc_aluno() );
            $statement_sql->bindValue( ':sexo_Aluno', $aluno->getsexo() );
            $statement_sql->bindValue( ':rg_Aluno', $aluno->getrg_Aluno() );
            $statement_sql->bindValue( ':tel_Aluno', $aluno->gettel_Aluno() );
            $statement_sql->bindValue( ':email_Aluno', $aluno->getemail_Aluno() );
            $statement_sql->bindValue( ':data_cad_Aluno', $Data_Cadastro );

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print 'Erro ao Inserir Aluno <br>' . $e . '<br>';
        }

    }

    public function update( Aluno $aluno ) {
        try {

            if ( $_FILES[ 'img' ][ 'name' ] != '' ) {

                $tipo = explode( '.', $_FILES[ 'img' ][ 'name' ] );
                $nome_img = substr( md5( $_FILES[ 'img' ][ 'name' ] ), 0, 6 ).'.'.$tipo[ 1 ];
                $tamanho = $_FILES[ 'img' ][ 'size' ];
                $nome_temp = $_FILES[ 'img' ][ 'tmp_name' ];
                $pasta = './upload/image/';

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

            $sql = "UPDATE tbl_aluno set login_Aluno=:login_Aluno,senha_Aluno=:senha_Aluno,
                    nm_Aluno=:nm_Aluno,sbnm_Aluno=:sbnm_Aluno,foto_Aluno=:foto_Aluno,
                    data_nasc_Aluno =:data_nasc_Aluno,sexo_Aluno=:sexo_Aluno,rg_Aluno =:rg_Aluno,
                    tel_Aluno=:tel_Aluno,email_Aluno=:email_Aluno,data_cad_Aluno=:data_cad_Aluno
                    WHERE id_Aluno = :id_Aluno";

            $Conexao = new Conexao();
            date_default_timezone_set( 'America/Sao_Paulo' );
            $Data_Cadastro = date( 'Y-m-d H:i:s' );
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Aluno', $aluno->getid_Aluno() );
            $statement_sql->bindValue( ':login_Aluno', $aluno->getLoginAluno() );
            $statement_sql->bindValue( ':senha_Aluno', $aluno->getSenhaAluno() );
            $statement_sql->bindValue( ':nm_Aluno', $aluno->getnmAluno() );
            $statement_sql->bindValue( ':sbnm_Aluno', $aluno->getsbnmAluno() );
            $statement_sql->bindValue( ':foto_Aluno', $nome_img );
            $statement_sql->bindValue( ':data_nasc_Aluno', $aluno->getdata_nasc_aluno() );
            $statement_sql->bindValue( ':sexo_Aluno', $aluno->getsexo() );
            $statement_sql->bindValue( ':rg_Aluno', $aluno->getrg_Aluno() );
            $statement_sql->bindValue( ':tel_Aluno', $aluno->gettel_Aluno() );
            $statement_sql->bindValue( ':email_Aluno', $aluno->getemail_Aluno() );
            $statement_sql->bindValue( ':data_cad_Aluno', $Data_Cadastro );
            //$statement_sql->debugDumpParams();

            return $statement_sql->execute();
        } catch ( Exception $e ) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete( Aluno $aluno ) {
        try {
            $sql = 'DELETE FROM tbl_aluno WHERE id_Aluno = :id_Aluno';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Aluno', $aluno->getid_Aluno() );
            return $statement_sql->execute();
        } catch ( Exception $e ) {
            echo "Erro ao Excluir Aluno<br> $e <br>";
        }
    }

    public function getAluno() {
        try {

            $sql = 'SELECT * FROM tbl_aluno order by nm_Aluno asc';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->query( $sql );
            $resultado = array();
            while ( $row = $statement_sql->fetch( PDO::FETCH_ASSOC ) ) {
                $aluno = new Aluno();
                $aluno->setid_Aluno( $row[ 'id_Aluno' ] );
                $aluno->setlogin_Aluno( $row[ 'login_Aluno' ] );
                $aluno->setnm_Aluno( $row[ 'nm_Aluno' ] );
                $aluno->setsenha_Aluno( $row[ 'senha_Aluno' ] );
                $aluno->setsbnm_Aluno( $row[ 'sbnm_Aluno' ] );
                $aluno->setfoto_Aluno( $row[ 'foto_Aluno' ] );
                $aluno->setrg_Aluno( $row[ 'rg_Aluno' ] );
                $aluno->settel_Aluno( $row[ 'tel_Aluno' ] );
                $aluno->setemail_Aluno( $row[ 'email_Aluno' ] );
                $aluno->setsexo_Aluno( $row[ 'sexo_Aluno' ] );
                $aluno->setdata_nasc_aluno( $row[ 'data_nasc_Aluno' ] );
                $resultado[] = $aluno;
            }
            return $resultado;
        } catch ( Exception $e ) {
            print 'Ocorreu um erro ao tentar Buscar Todos.' . $e;
        }
    }

    public function ProcurarAlunoPorCodigo( Aluno $aluno ) {

        try {
            $sql = 'select * from tbl_aluno where id_Aluno = :id_Aluno';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':id_Aluno', $aluno->getid_Aluno() );
            $statement_sql->execute();
            $row =  $statement_sql->fetch( PDO::FETCH_ASSOC ) ;
            if ( $statement_sql ) {
                $aluno->setlogin_Aluno( $row[ 'login_Aluno' ] );
                $aluno->setnm_Aluno( $row[ 'nm_Aluno' ] );
                $aluno->setsbnm_Aluno( $row[ 'sbnm_Aluno' ] );
                $aluno->setsenha_Aluno( $row[ 'senha_Aluno' ] );
                $aluno->setrg_Aluno( $row[ 'rg_Aluno' ] );
                $aluno->settel_Aluno( $row[ 'tel_Aluno' ] );
                $aluno->setsexo_Aluno( $row[ 'sexo_Aluno' ] );
                $aluno->setemail_Aluno( $row[ 'email_Aluno' ] );
                $aluno->setdata_nasc_aluno( $row[ 'data_nasc_Aluno' ] );
                $aluno->setfoto_Aluno( $row[ 'foto_Aluno' ] );
            }
            return $aluno;
            //$statement_sql->debugDumpParams();

        } catch ( PDOException $exc ) {
            print 'Erro :: ' . $exc->getMessage();
        }
    }

    public function logaAluno( Aluno $aluno ) {
        try {
            $sql = 'select * from tbl_aluno where login_Aluno = :login AND senha_Aluno =:senha';
            $Conexao = new Conexao();
            $statement_sql = $Conexao->Conectar()->prepare( $sql );
            $statement_sql->bindValue( ':login', $aluno->getLoginAluno() );
            $statement_sql->bindValue( ':senha', $aluno->getSenhaAluno() );
            $statement_sql->execute();
            $row = $statement_sql->fetch( PDO::FETCH_ASSOC );
            //$statement_sql->debugDumpParams();
            if ( $statement_sql->rowCount() > 0 ) {
                ob_start();
                session_start();

                $_SESSION[ 'id_Aluno' ]    = $row[ 'id_Aluno' ];
                $_SESSION[ 'login_Aluno' ] = $row[ 'login_Aluno' ];
                $_SESSION[ 'senha_Aluno' ] = $row[ 'senha_Aluno' ];
                $_SESSION[ 'foto_Aluno' ]  = $row[ 'foto_Aluno' ];
                $_SESSION[ 'logado' ] = 'sim';
                $_SESSION[ 'Aluno' ] = 'Aluno';

                header( 'Location: index.php' );

            } else {
                $_SESSION[ 'loginErro' ] = 'Usuário ou Senha inválido!';
                header( 'location: loginAluno.php' );
            }

        } catch ( PDOException $exc ) {
            print 'Erro :: ' . $exc->getMessage();
        }
    }

    public function sairAluno() {
        session_start();
        session_destroy();
        header( 'location: login.php' );
    }

    public function paginacao_Alunos( $inicio, $registros ) {

        try {

            $condition  =   '';
            if ( isset( $_POST[ 'search' ] ) and $_POST[ 'search' ] != '' ) {
                $condition  .=  'Where nm_Aluno LIKE :search ';
            }
            $sql = 'select * from tbl_aluno '.$condition." LIMIT $inicio, $registros";
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
                $aluno = new Aluno();
                $aluno->setid_Aluno( $row[ 'id_Aluno' ] );
                $aluno->setlogin_Aluno( $row[ 'login_Aluno' ] );
                $aluno->setnm_Aluno( $row[ 'nm_Aluno' ] );
                $aluno->setsenha_Aluno( $row[ 'senha_Aluno' ] );
                $aluno->setsbnm_Aluno( $row[ 'sbnm_Aluno' ] );
                $aluno->setfoto_Aluno( $row[ 'foto_Aluno' ] );
                $aluno->setrg_Aluno( $row[ 'rg_Aluno' ] );
                $aluno->settel_Aluno( $row[ 'tel_Aluno' ] );
                $aluno->setemail_Aluno( $row[ 'email_Aluno' ] );
                $aluno->setsexo_Aluno( $row[ 'sexo_Aluno' ] );
                $aluno->setdata_nasc_aluno( $row[ 'data_nasc_Aluno' ] );
                $resultado[] = $aluno;
            }
            return $resultado;
        } catch ( PDOException $e ) {
            print ' Erro em m_paginacao_cliente ' . $e->getMessage();
        }
    }

    public function populaAluno( $row ) {
        $aluno = new Aluno();
        $aluno->setid_Aluno( $row[ 'id_Aluno' ] );
        $aluno->setnm_Aluno( $row[ 'nm_Aluno' ] );
        $aluno->setlogin_Aluno( $row[ 'login_Aluno' ] );
        $aluno->setsenha_Aluno( $row[ 'senha_Aluno' ] );
        $aluno->setsbnm_Aluno( $row[ 'sbnm_Aluno' ] );
        $aluno->setfoto_Aluno( $row[ 'foto_Aluno' ] );
        $aluno->setrg_Aluno( $row[ 'rg_Aluno' ] );
        $aluno->settel_Aluno( $row[ 'tel_Aluno' ] );
        $aluno->setemail_Aluno( $row[ 'email_Aluno' ] );
        $aluno->setsexo_Aluno( $row[ 'sexo_Aluno' ] );
        $aluno->setdata_nasc_aluno( $row[ 'data_nasc_Aluno' ] );
        return $aluno;
    }

}

?>