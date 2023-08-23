<?php

class Conexao {
    /*
    protected function Conectar() {
        try {
            $connect = new PDO( 'mysql:host=localhost;dbname=academia;charset=utf8;', 'root', '' );
            $connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            return $connect;

        } catch ( Exception $e ) {
            die( 'Error db(connect) '.$e->getMessage() );
        }
    }
    */
    //ATRIBUTO PRIVADOS
    private $usuario;
    private $senha;
    private $banco;
    private $servidor;
    private static $pdo;
    //CONSTRUTOR

    public function __construct() {

        $this->servidor = 'localhost';
        $this->banco = 'academia';
        $this->usuario = 'root';

        $this->senha = '';
    }
    //METODO PARA CONECTAR

    public function Conectar() {
        try {
            if ( is_null( self::$pdo ) ) {
                self::$pdo = new PDO( 'mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->senha );
                self::$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            return self::$pdo;
        } catch( PDOException $e ) {
            echo 'Error: '.$e->getMessage();
        }
    }

}