<?php

class Ministrar extends Conexao {

    private $fk_Instrutor_id_Instrutor;
    private $fk_Musculacao_id_Musculacao;
    private $data_inicial_semana;
    private $hora_inicial_semana;
    private $data_final_semana;
    private $hora_final_semana;
    private $nm_aula_Ministrada;

    function getnm_aula_Ministrada() {
        return $this->nm_aula_Ministrada;
    }

    function getdata_inicial_semana() {
        return $this->data_inicial_semana;
    }

    function gethora_inicial_semana() {
        return $this->hora_inicial_semana;
    }

    function getdata_final_semana() {
        return $this->data_final_semana;
    }

    function gethora_final_semana() {
        return $this->hora_final_semana;
    }

    function getfk_Instrutor_id_Instrutor() {
        return $this->fk_Instrutor_id_Instrutor;
    }

    function getfk_Musculacao_id_Musculacao() {
        return $this->fk_Musculacao_id_Musculacao;
    }

    function setnm_aula_Ministrada( $nm_aula_Ministrada ) {
        return $this->nm_aula_Ministrada = $nm_aula_Ministrada;
    }

    function setdata_inicial_semana( $data_inicial_semana ) {
        return $this->data_inicial_semana = $data_inicial_semana;
    }

    function sethora_inicial_semana( $hora_final_semana ) {
        return $this->hora_inicial_semana = $hora_final_semana;
    }

    function setdata_final_semana( $data_final_semana ) {
        return $this->data_final_semana = $data_final_semana;
    }

    function sethora_final_semana( $hora_final_semana ) {
        return $this->hora_final_semana = $hora_final_semana;
    }

    function setfk_Instrutor_id_Instrutor( $fk_Instrutor_id_Instrutor ) {
        return $this->fk_Instrutor_id_Instrutor = $fk_Instrutor_id_Instrutor;
    }

    function setfk_Musculacao_id_Musculacao( $fk_Musculacao_id_Musculacao ) {
        return $this->fk_Musculacao_id_Musculacao = $fk_Musculacao_id_Musculacao;
    }

}