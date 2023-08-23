<?php
 
require_once __DIR__ . '../../dao/AlunosDAO.php';
//instancia as classes
class ALunosController {

    public function gravarAlunos() {

        $Alunodao = new AlunosDAO();
        $aluno = new Aluno;
        $aluno->setnm_Aluno($_POST['nm_Aluno'] );
        $aluno->setlogin_Aluno( $_POST['login'] );
        $aluno->setsenha_Aluno( $_POST['senha'] );
        $aluno->setsbnm_Aluno( $_POST['sbnm_Aluno'] );
        $aluno->setrg_Aluno( $_POST['rg'] );
        $aluno->settel_Aluno($_POST['tel_aluno'] );
        $aluno->setemail_Aluno($_POST['email_aluno'] );
        $aluno->setsexo_Aluno($_POST['sexo'] );
        $data_nasc = implode("-", array_reverse(explode("/", $_POST['data_nasc_Aluno'])));
        $aluno->setdata_nasc_aluno($data_nasc );
        $Alunodao->SalvarFoto($aluno);

    }

    public function AlterarAlunos() {

        $Alunodao = new AlunosDAO();
        $aluno = new Aluno;
        $aluno->setid_Aluno( $_POST['id_Aluno']);
        $aluno->setlogin_Aluno( $_POST['login'] );
        $aluno->setsenha_Aluno( $_POST['senha'] );
        $aluno->setnm_Aluno($_POST['nm_Aluno'] );
        $aluno->setsbnm_Aluno( $_POST['sbnm_Aluno'] );
        $data_nasc = implode("-", array_reverse(explode("/", $_POST['data_nasc_Aluno'])));
        $aluno->setdata_nasc_aluno($data_nasc );
        $aluno->setsexo_Aluno($_POST['sexo'] );
        $aluno->setrg_Aluno( $_POST['rg'] );
        $aluno->settel_Aluno($_POST['tel_aluno'] );
        $aluno->setemail_Aluno($_POST['email_aluno'] );
        $Alunodao->update($aluno);

    }
    public function buscar_Alunos() {

        $Alunodao = new AlunosDAO();
        return $Alunodao->getAluno();
    }
    public function BuscarAlunoPorCodigo() {
        $aluno = new Aluno();
        $alunodao = new AlunosDAO();
        $aluno->setid_Aluno($_GET["id_Aluno"]);
        return $alunodao->ProcurarAlunoPorCodigo($aluno);
    }
    public function BuscarAlunoLogado(){
        $aluno = new Aluno();
        $Alunodao = new AlunosDAO();
        $aluno->setlogin_Aluno($_POST['login']);
        $aluno->setsenha_Aluno($_POST['senha']);
        return $Alunodao->logaAluno($aluno);
    }
    public function SaidaAluno(){
        $Alunodao = new AlunosDAO();
        return $Alunodao->sairAluno();
    }

    public function Buscar_paginacao_Alunos($inicio, $registros) {
        $Alunodao = new AlunosDAO();
        return $Alunodao->paginacao_Alunos($inicio, $registros);
    }

    public function Deletar_Alunos() {

        $aluno = new Aluno;
        $Alunodao = new AlunosDAO();
        $aluno->setid_Aluno($_GET["id_Aluno"]);
        return $Alunodao->delete($aluno);
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