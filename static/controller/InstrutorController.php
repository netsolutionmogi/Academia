<?php
 
require_once __DIR__ . '../../dao/InstrutorDAO.php';
//instancia as classes
class InstrutorController {

    public function gravarProfessor() {

        $instrutordao = new InstrutorDAO();
        $instrutor = new Instrutor();
        $instrutor->setnm_Instrutor($_POST['nm_Instrutor'] );
        $instrutor->setsbnm_Instrutor( $_POST['sbnm_Instrutor'] );
        $data_nasc = implode("-", array_reverse(explode("/", $_POST['data_nasc_instrutor'])));
        $instrutor->setdata_nasc_Instrutor($data_nasc );
        $instrutor->setsexo_Instrutor($_POST['sexo'] );
        $instrutor->setrg_Instrutor( $_POST['rg'] );
        $instrutor->setcpf_Instrutor($_POST['cpf']);
        $instrutor->setlogin_Instrutor( $_POST['login'] );
        $instrutor->setsenha_Instrutor( $_POST['senha'] );
        $instrutor->setlogra_Instrutor($_POST['logradouro']);
        $instrutor->setnum_Instrutor($_POST['num_instrutor']);
        $instrutor->setcompl_Instrutor($_POST['compl_instrutor']);
        $instrutor->setbairro_Instrutor($_POST['bairro']);
        $instrutor->setcep_Instrutor($_POST['cep']);
        $instrutor->setcidade_Instrutor($_POST['cidade']);
        $instrutor->setemail_Instrutor($_POST['email_Instrutor'] );
        $instrutor->settel_Instrutor($_POST['tel_instrutor'] );
        $instrutordao->SalvarInstrutor($instrutor);

    }

    public function AlterarInstrutor() {

        $instrutordao = new InstrutorDAO();
        $instrutor = new Instrutor();
        $instrutor->setnm_Instrutor($_POST['nm_Instrutor'] );
        $instrutor->setsbnm_Instrutor( $_POST['sbnm_Instrutor'] );
        $data_nasc = implode("-", array_reverse(explode("/", $_POST['data_nasc_instrutor'])));
        $instrutor->setdata_nasc_Instrutor($data_nasc );
        $instrutor->setsexo_Instrutor($_POST['sexo'] );
        $instrutor->setrg_Instrutor( $_POST['rg'] );
        $instrutor->setcpf_Instrutor($_POST['cpf']);
        $instrutor->setlogin_Instrutor( $_POST['login'] );
        $instrutor->setsenha_Instrutor( $_POST['senha'] );
        $instrutor->setlogra_Instrutor($_POST['logradouro']);
        $instrutor->setnum_Instrutor($_POST['num_instrutor']);
        $instrutor->setcompl_Instrutor($_POST['compl_instrutor']);
        $instrutor->setbairro_Instrutor($_POST['bairro']);
        $instrutor->setcep_Instrutor($_POST['cep']);
        $instrutor->setcidade_Instrutor($_POST['cidade']);
        $instrutor->setemail_Instrutor($_POST['email_instrutor'] );
        $instrutor->settel_Instrutor($_POST['tel_instrutor'] );
        $instrutordao->updateInstrutor($instrutor);

    }
    public function buscar_Instrutor() {

        $instrutordao = new InstrutorDAO();
        return $instrutordao->getInstrutor();
    }
    public function BuscarInstrutorPorCodigo() {
        $instrutor = new Instrutor();
        $instrutordao = new InstrutorDAO();
        $instrutor->setid_Instrutor($_GET["id_Instrutor"]);
        return $instrutordao->ProcurarInstrutorPorCodigo($instrutor);
    }
    public function BuscarInstrutorLogado(){
        $instrutor = new Instrutor();
        $instrutordao = new InstrutorDAO();
        $instrutor->setlogin_Instrutor($_POST['login']);
        $instrutor->setsenha_Instrutor($_POST['senha']);
        return $instrutordao->logarInstrutor($instrutor);
    }
    public function SaidaInstrutor(){
        $instrutordao = new InstrutorDAO();
        return $instrutordao->sairInstrutor();
    }
    public function Buscar_paginacao_Instrutor($inicio, $registros) {
        $instrutordao = new InstrutorDAO();
        return $instrutordao->paginacao_Instrutor($inicio, $registros);
    }

    public function Deletar_Instrutor() {

        $instrutor = new Instrutor();
        $instrutordao = new InstrutorDAO();
        $instrutor->setid_Instrutor($_GET["id_Instrutor"]);
        return $instrutordao->deleteInstrutor($instrutor);
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