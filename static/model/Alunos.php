<?php

class Aluno {

    private $id_aluno;
    private $login_Aluno;
    private $senha_aluno;
    private $nm_Aluno;
    private $sbnm_Aluno;
    private $foto_Aluno;
    private $rg_Aluno;
    private $tel_Aluno;
    private $email_Aluno;
    private $sexo_aluno;
    private $data_cad_aluno;
    private $data_nasc_aluno;
    private $hora_cad_Aluno;

    public function getid_Aluno() {
        return $this->id_aluno;
    }

    public function getLoginAluno() {
        return $this->login_Aluno;
    }

    public function getSenhaAluno() {
        return $this->senha_aluno;
    }

    public function getnmAluno() {
        return $this->nm_Aluno;
    }

    public function getsbnmAluno() {
        return $this->sbnm_Aluno;
    }

    public function getfoto_Aluno() {
        return $this->foto_Aluno;
    }

    public function getrg_Aluno() {
        return $this->rg_Aluno;
    }

    public function gettel_Aluno() {
        return $this->tel_Aluno;
    }

    public function getemail_Aluno() {
        return $this->email_Aluno;
    }

    public function getsexo() {
        return $this->sexo_aluno;
    }

    public function getdata_cad_aluno() {
        return $this->data_cad_aluno;
    }

    public function getdata_nasc_aluno() {
        return $this->data_nasc_aluno;
    }

    public function gethora_cad_Aluno() {
        return $this->hora_cad_Aluno;
    }

    public function setid_Aluno( $id_aluno ) {
        $this->id_aluno = $id_aluno;
    }

    public function setlogin_Aluno( $login_Aluno ) {
        $this->login_Aluno = $login_Aluno;
    }

    public function setsenha_Aluno( $senha_aluno ) {
        $this->senha_aluno = $senha_aluno;
    }

    public function setnm_Aluno( $nm_Aluno ) {
        $this->nm_Aluno = $nm_Aluno;
    }

    public function setsbnm_Aluno( $sbnm_Aluno ) {
        $this->sbnm_Aluno = $sbnm_Aluno;
    }

    public function setfoto_Aluno( $foto_Aluno ) {
        $this->foto_Aluno = $foto_Aluno;
    }

    public function setrg_Aluno( $rg_Aluno ) {
        $this->rg_Aluno = $rg_Aluno;
    }

    public function setemail_Aluno( $email_Aluno ) {
        $this->email_Aluno = $email_Aluno;
    }

    public function settel_Aluno( $tel_Aluno ) {
        $this->tel_Aluno = $tel_Aluno;
    }

    public function setsexo_Aluno( $sexo_aluno ) {
        $this->sexo_aluno = $sexo_aluno;
    }

    public function setdata_cad_aluno( $data_cad_aluno ) {
        return $this->data_cad_aluno = $data_cad_aluno;
    }

    public function setdata_nasc_aluno( $data_nasc_aluno ) {
        return $this->data_nasc_aluno = $data_nasc_aluno;
    }

    public function sethora_cad_Aluno( $hora_cad_Aluno ) {
        return $this->hora_cad_Aluno = $hora_cad_Aluno;
    }

}