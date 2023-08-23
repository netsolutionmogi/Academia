<?php

class Produto {

    private $id_Produto;
    private $nm_Produto;
    private $desc_Produto;
    private $vlr_unit_Produto;
    private $qtde_Produto;
    private $vlr_total_Produto;
    private $fk_ALUNO_id_Aluno;

    public function getid_Produto() {
        return $this->id_Produto;
    }

    public function getnm_Produto() {
        return $this-> nm_Produto;
    }

    public function getdesc_Produto() {
        return $this->desc_Produto;
    }

    public function getqtde_Produto() {
        return $this->qtde_Produto;
    }

    public function getvlr_total_Produto() {
        return $this->vlr_total_Produto;
    }

    public function getvlr_unit_Produto() {
        return $this->vlr_unit_Produto;
    }

    public function getfk_ALUNO_id_Aluno() {
        return $this->fk_ALUNO_id_Aluno;
    }

    public function setid_Produto( $id_Produto ) {
        $this->id_Produto = $id_Produto;
    }

    public function setnm_Produto( $nm_Produto ) {
        $this->nm_Produto = $nm_Produto;
    }

    public function setdesc_Produto( $desc_Produto ) {
        $this->desc_Produto = $desc_Produto;
    }

    public function setqtde_Produto( $qtde_Produto ) {
        return $this->qtde_Produto = $qtde_Produto;
    }

    public function setvlr_total_Produto( $vlr_total_Produto ) {
        return $this->vlr_total_Produto = $vlr_total_Produto;
    }

    public function setvlr_unit_Produto( $vlr_unit_Produto ) {
        $this->vlr_unit_Produto = $vlr_unit_Produto;
    }

    public function setfk_ALUNO_id_Aluno( $fk_ALUNO_id_Aluno ) {
        return $this->fk_ALUNO_id_Aluno = $fk_ALUNO_id_Aluno;
    }

}