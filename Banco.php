<?php

class Banco {
    private $usuario;
    private $senha;
    private $servidor;
    private $porta;
    private $nome_banco;
    private $mysqli;

    public function __construct() {
        $this->usuario = "root";
        $this->senha = "";
        $this->servidor = "localhost";
        $this->porta = "3306";
        $this->nome_banco = "cadastro_usuario";
        $this->mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->nome_banco, $this->porta);

        if ($this->mysqli->connect_error) {
            die("Conexão falhou: " . $this->mysqli->connect_error);
        }
    }

    public function Consultar($sql) {
        $result = $this->Executar($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function Executar($sql) {
        $result = $this->mysqli->query($sql);
        if (!$result) {
            die("Erro na execução da consulta: " . $this->mysqli->error);
        }
        return $result;
    }

    public function __destruct() {
        $this->mysqli->close();
    }
}