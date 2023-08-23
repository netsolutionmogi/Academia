<?php

class Estoque {

    private $id_prod_Estoque;
    private $nm_prod_Estoque;
    private $qtde_prod_Estoque;
    private $data_cad_prod_Estoque;
    private $data_saida_prod_Estoque;
    private $hora_cad_prod_Estoque;
    private $hora_saida_prod_Estoque;
    private $FK_PRODUTO_id_Produto;

    public function getid_prod_Estoque() {
        return $this->id_prod_Estoque;
    }

    public function getnm_prod_Estoque() {
        return $this-> nm_prod_Estoque;
    }

    public function getqtde_prod_Estoque() {
        return $this-> qtde_prod_Estoque;
    }

    public function getdata_cad_prod_Estoque() {
        return $this->data_cad_prod_Estoque;
    }

    public function getdata_saida_prod_Estoque() {
        return $this->data_saida_prod_Estoque;
    }

    public function gethora_cad_prod_Estoque() {
        return $this->hora_cad_prod_Estoque;
    }

    public function gethora_saida_prod_Estoque() {
        return $this->hora_saida_prod_Estoque;
    }

    public function getFK_PRODUTO_id_Produto() {
        return $this->FK_PRODUTO_id_Produto;
    }

    public function setid_prod_Estoque( $id_prod_Estoque ) {
        $this->id_prod_Estoque = $id_prod_Estoque;
    }

    public function setnm_prod_Estoque( $nm_prod_Estoque ) {
        $this->nm_prod_Estoque = $nm_prod_Estoque;
    }

    public function setqtde_prod_Estoque( $qtde_prod_Estoque ) {
        $this->qtde_prod_Estoque = $qtde_prod_Estoque;
    }

    public function setdata_cad_prod_Estoque( $data_cad_prod_Estoque ) {
        $this->data_cad_prod_Estoque = $data_cad_prod_Estoque;
    }

    public function setdata_saida_prod_Estoque( $data_saida_prod_Estoque ) {
        $this->data_saida_prod_Estoque = $data_saida_prod_Estoque;
    }

    public function sethora_cad_prod_Estoque( $hora_cad_prod_Estoque ) {
        $this->hora_cad_prod_Estoque = $hora_cad_prod_Estoque;
    }

    public function sethora_saida_prod_Estoque( $hora_saida_prod_Estoque ) {
        $this->hora_saida_prod_Estoque = $hora_saida_prod_Estoque;
    }

    public function setFK_PRODUTO_id_Produto( $FK_PRODUTO_id_Produto ) {
        return $this->FK_PRODUTO_id_Produto = $FK_PRODUTO_id_Produto;
    }

}