<?php
date_default_timezone_set('America/Sao_Paulo');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once ("Autenticacao.php");
$_SESSION['token'] = null;
$login = $_POST['usu'];
$senha = $_POST['sen'];
$Auth = new Autenticacao($login);
if ($Auth->validaSenha($senha)) {
    $token = $Auth->tokenValido();
    if ($token == null) {
        $token = $Auth->gerarToken();
    }
    $_SESSION['token'] = $token;
    $response = [
        "status" => "1",
        "msg" => "Login efetuado com sucesso!",
        "token" => $token
    ];
} else {
    $response = [
        "status" => "0",
        "msg" => "Usuário ou senha inválido"
    ];
}
echo json_encode($response); //fim