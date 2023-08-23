<?php

class Treino {

    private $id_Atividade_faz_Atividade;
    private $desc_faz_Atividade;
    private $data_inicio_semana_faz_Atividade;
    private $hora_inicio_semana_faz_Atividade;
    private $data_fim_semana_faz_Atividade;
    private $hora_fim_semana_faz_Atividade;
    private $data_cad_faz_Atividade;
    private $FK_ATIVIDADE_id_Atividade;
    private $FK_RECEPCIONISTA_id_Recepcionista;
    private $FK_INSTRUTOR_id_Instrutor;
    private $FK_ALUNO_id_Aluno;
    private $nm_Recepcionista;

    public function getid_Atividade_faz_Atividade() {
        return $this->id_Atividade_faz_Atividade;
    }

    public function getdesc_faz_Atividade() {
        return $this->desc_faz_Atividade;
    }

    public function getnm_Recepcionista() {
        return $this->nm_Recepcionista;
    }

    public function getdata_inicio_semana_faz_Atividade() {
        return $this->data_inicio_semana_faz_Atividade;
    }

    public function gethora_inicio_semana_faz_Atividade() {
        return $this->hora_inicio_semana_faz_Atividade;
    }

    public function getdata_fim_semana_faz_Atividade() {
        return $this->data_fim_semana_faz_Atividade;
    }

    public function getdata_cad_faz_Atividade() {
        return $this->data_cad_faz_Atividade;
    }

    public function gethora_fim_semana_faz_Atividadeo() {
        return $this->hora_fim_semana_faz_Atividade;
    }

    public function ATIVIDADE_id_Atividade() {
        return $this->FK_ATIVIDADE_id_Atividade;

    }

    public function getRecepcionista_id_Recepcionista() {
        return $this->FK_RECEPCIONISTA_id_Recepcionista;
    }

    public function getInstrutor_id_Instrutor() {
        return $this->FK_INSTRUTOR_id_Instrutor;
    }

    public function getAluno_id_Aluno() {
        return $this->FK_ALUNO_id_Aluno;
    }

    public function getATIVIDADE_id_Atividade() {
        return $this->FK_ATIVIDADE_id_Atividade;

    }

    public function setid_Atividade_faz_Atividade( $id_Atividade_faz_Atividade ) {
        return $this->id_Atividade_faz_Atividade = $id_Atividade_faz_Atividade;
    }

    public function setdesc_faz_Atividade( $desc_faz_Atividade ) {
        return $this->desc_faz_Atividade = $desc_faz_Atividade;
    }

    function setAluno_id_Aluno( $FK_ALUNO_id_Aluno ) {
        return $this->FK_ALUNO_id_Aluno = $FK_ALUNO_id_Aluno;
    }

    public function setdata_inicio_semana_faz_Atividade( $data_inicio_semana_faz_Atividade ) {
        return $this->data_inicio_semana_faz_Atividade = $data_inicio_semana_faz_Atividade;
    }

    public function sethora_inicio_semana_faz_Atividade( $hora_inicio_semana_faz_Atividade ) {
        return $this->hora_fim_semana_faz_Atividade = $hora_inicio_semana_faz_Atividade;
    }

    public function setdata_fim_semana_faz_Atividade( $data_fim_semana_faz_Atividade ) {
        return $this->data_fim_semana_faz_Atividade = $data_fim_semana_faz_Atividade;
    }

    public function setdata_cad_faz_Atividade( $data_cad_faz_Atividade ) {
        return $this->data_cad_faz_Atividade = $data_cad_faz_Atividade;
    }

    public function setFK_ATIVIDADE_id_Atividade( $FK_ATIVIDADE_id_Atividade ) {
        return $this->FK_ATIVIDADE_id_Atividade = $FK_ATIVIDADE_id_Atividade;
    }

    public function setFK_RECEPCIONISTA_id_Recepcionista( $FK_RECEPCIONISTA_id_Recepcionista ) {
        return $this->FK_RECEPCIONISTA_id_Recepcionista = $FK_RECEPCIONISTA_id_Recepcionista;
    }

    public function setFK_INSTRUTOR_id_Instrutor( $FK_INSTRUTOR_id_Instrutor ) {
        return $this->FK_INSTRUTOR_id_Instrutor = $FK_INSTRUTOR_id_Instrutor;
    }

    public function setFK_ALUNO_id_Aluno( $FK_ALUNO_id_Aluno ) {
        return $this->FK_ALUNO_id_Aluno = $FK_ALUNO_id_Aluno;

    }

    public function setATIVIDADE_id_Atividade( $FK_ATIVIDADE_id_Atividade ) {
        return $this->FK_ATIVIDADE_id_Atividade = $FK_ATIVIDADE_id_Atividade;

    }

    public function sethora_fim_semana_faz_Atividadeo( $hora_fim_semana_faz_Atividade ) {
        return $this->hora_fim_semana_faz_Atividade = $hora_fim_semana_faz_Atividade;
    }

    public function setnm_Recepcionista( $nm_Recepcionista ) {
        return $this->nm_Recepcionista = $nm_Recepcionista;
    }

}