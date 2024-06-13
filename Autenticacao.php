<?php
require_once("Banco.php");

class Autenticacao {
    private static $banco;
    private static $usuario;
    public function __construct($login) {
        $this->banco = new Banco();
        $sql = "select * from usuario u where u.email_login = '{$login}' ";
        $result = $this->banco->Consultar($sql);
        $this->usuario = $result[0];
    }

    public function validaSenha($senha){
        return ($this->usuario['senha'] == $senha) ;
    }

    public function tokenValido() {
        $token = null;
        $idusuario = $this->usuario['id'];
        $sql = "select * 
                  from login_control
                 where idusuario = {$idusuario}
                   and now() between criado and expira
                 order by id desc
                 limit 1";
        $result = $this->banco->Consultar($sql);
        $log_acesso = $result[0];//incio
        if (isset($log_acesso['token'])) {
            $token = $log_acesso['token'];
        }
        return $token;
    }

    public function gerarToken() {
        $token = md5(uniqid(mt_rand(), true));
        $idusuario = $this->usuario['id'];
        $sql = " insert into login_control " .
            " ( idusuario, token, criado, expira) " .
            " values " .
            " ( {$idusuario}, '{$token}', now(), DATE_ADD(now(), INTERVAL 12 hour)) ";
        $this->banco->Excutar($sql);
        return $token;
    }
}