<?php

class Atividade {

    private $id_Atividade;
    private $nm_Atividade;
    private $vlr_mensal_Atividade;
    private $vlr_total_Atividade;
    private $desco_mensal_Atividade;
    private $desc_Atividade;
    private $data_cad_Treino;

    public function getid_Atividade() {
        return $this->id_Atividade;
    }

    public function getnm_Atividade() {
        return $this-> nm_Atividade;
    }

    public function getvlr_mensal_Atividade() {
        return $this->vlr_mensal_Atividade;
    }

    public function getvlr_total_Atividade() {
        return $this->vlr_total_Atividade;
    }

    public function getdesco_mensal_Atividade() {
        return $this->desco_mensal_Atividade;
    }

    public function getdesc_Atividade() {
        return $this->desc_Atividade;
    }

    public function getdata_cad_Treino() {
        return $this->data_cad_Treino;
    }

    public function setid_Atividade( $id_Atividade ) {
        $this->id_Atividade = $id_Atividade;
    }

    public function setnm_Atividade( $nm_Atividade ) {
        $this->nm_Atividade = $nm_Atividade;
    }

    public function setvlr_mensal_Atividade( $vlr_mensal_Atividade ) {
        $this->vlr_mensal_Atividade = $vlr_mensal_Atividade;
    }

    public function setvlr_total_Atividade( $vlr_total_Atividade ) {
        $this->vlr_total_Atividade = $vlr_total_Atividade;
    }

    public function setdesco_mensal_Atividade( $desco_mensal_Atividade ) {
        $this->desco_mensal_Atividade = $desco_mensal_Atividade;
    }

    public function setdesc_Atividade( $desc_Atividade ) {
        $this->desc_Atividade = $desc_Atividade;
    }

    public function setdata_cad_Treino( $data_cad_Treino ) {
        return $this->data_cad_Treino = $data_cad_Treino;
    }
}