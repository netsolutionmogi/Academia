<?php
 
require_once __DIR__ . '../../dao/RecepcionistaDAO.php';
//instancia as classes
class RecepcionistaController {

    public function gravarRecepcionista() {

        $recepcionistadao = new RecepcionistaDAO();
        $recepcionista = new Recepcionista();
        date_default_timezone_set( 'America/Sao_Paulo' );
        $Data_Cadastro = date( 'Y-m-d' );
        $recepcionista->setnm_Recepcionista($_POST['nm_Recepcionista'] );
        $recepcionista->setsbnm_Recepcionista( $_POST['sbnm_Recepcionista'] );
        $data_nasc = implode("-", array_reverse(explode("/", $_POST['data_nasc_Recepcionista'])));
        $recepcionista->setdata_nasc_Recepcionista($data_nasc );
        $recepcionista->setsexo_Recepcionista($_POST['sexo'] );
        $recepcionista->setrg_Recepcionista( $_POST['rg'] );
        $recepcionista->setcpf_Recepcionista($_POST['cpf']);
        $recepcionista->setlogin_Recepcionista( $_POST['login'] );
        $recepcionista->setsenha_Recepcionista( $_POST['senha'] );
        $recepcionista->setlogra_Recepcionista($_POST['logradouro']);
        $recepcionista->setnum_Recepcionista($_POST['num_Recepcionista']);
        $recepcionista->setcompl_Recepcionista($_POST['compl_Recepcionista']);
        $recepcionista->setbairro_Recepcionista($_POST['bairro']);
        $recepcionista->setcidade_Recepcionista($_POST['cidade']);
        $recepcionista->setcep_Recepcionista($_POST['cep']);
        $recepcionista->setemail_Recepcionista($_POST['email_Recepcionista'] );
        $recepcionista->settel_Recepcionista($_POST['tel_Recepcionista'] );
        //$recepcionista->setdata_cad_Recepcionista( $Data_Cadastro );
        $recepcionistadao->SalvarRecepcionista($recepcionista);

    }

    public function AlterarRecepcionista() {

        $recepcionistadao = new RecepcionistaDAO();
        $recepcionista = new Recepcionista();
        date_default_timezone_set( 'America/Sao_Paulo' );
        $Data_Cadastro = date( 'Y-m-d' );
        $recepcionista->setnm_Recepcionista($_POST['nm_Recepcionista'] );
        $recepcionista->setsbnm_Recepcionista( $_POST['sbnm_Recepcionista'] );
        $data_nasc = implode("-", array_reverse(explode("/", $_POST['data_nasc_Recepcionista'])));
        $recepcionista->setdata_nasc_Recepcionista($data_nasc );
        $recepcionista->setsexo_Recepcionista($_POST['sexo'] );
        $recepcionista->setrg_Recepcionista( $_POST['rg'] );
        $recepcionista->setcpf_Recepcionista($_POST['cpf']);
        $recepcionista->setlogin_Recepcionista( $_POST['login'] );
        $recepcionista->setsenha_Recepcionista( $_POST['senha'] );
        $recepcionista->setlogra_Recepcionista($_POST['logradouro']);
        $recepcionista->setnum_Recepcionista($_POST['num_Recepcionista']);
        $recepcionista->setcompl_Recepcionista($_POST['compl_Recepcionista']);
        $recepcionista->setbairro_Recepcionista($_POST['bairro']);
        $recepcionista->setcidade_Recepcionista($_POST['cidade']);
        $recepcionista->setcep_Recepcionista($_POST['cep']);
        $recepcionista->setemail_Recepcionista($_POST['email_Recepcionista'] );
        $recepcionista->settel_Recepcionista($_POST['tel_Recepcionista'] );
        $recepcionistadao->updateRecepcionista($recepcionista);

    }
    public function buscar_Recepcionista() {

        $recepcionistadao = new RecepcionistaDAO();
        return $recepcionistadao->getRecepcionista();
    }
    public function BuscarRecepcionistaPorCodigo() {
        $recepcionista = new Recepcionista();
        $recepcionistadao = new RecepcionistaDAO();
        $recepcionista->setid_Recepcionista($_GET["id_Recepcionista"]);
        return $recepcionistadao->ProcurarRecepcionistaPorCodigo($recepcionista);
    }
    public function BuscarRecepcionistaLogado(){
        $recepcionista = new Recepcionista();
        $recepcionistadao = new RecepcionistaDAO();
        $recepcionista->setlogin_Recepcionista($_POST['login']);
        $recepcionista->setsenha_Recepcionista($_POST['senha']);
        return $recepcionistadao->logarRecepcionista($recepcionista);
    }
    public function SaidaRecepcionista(){
        $recepcionistadao = new RecepcionistaDAO();
        return $recepcionistadao->sairRecepcionista();
    }
    public function Buscar_paginacao_Recepcionista($inicio, $registros) {
        $recepcionistadao = new RecepcionistaDAO();
        return $recepcionistadao->paginacao_Recepcionista($inicio, $registros);
    }

    public function Deletar_Recepcionista() {

        $recepcionista = new Recepcionista();
        $recepcionistadao = new RecepcionistaDAO();
        $recepcionista->setid_Recepcionista($_GET["id_Recepcionista"]);
        return $recepcionistadao->deleteRecepcionista($recepcionista);
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