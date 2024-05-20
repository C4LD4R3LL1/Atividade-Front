<?php
header('Content-Type: application/json');

if(isset($_REQUEST["email"]) && isset($_REQUEST["senha"])) {
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["senha"];
    // Conectando ao banco de dados
    $host = "localhost";
    $bd = "cadastro_usuario";
    $usuario = "root";
    $senha_db = "";
    $conexao = mysqli_connect($host, $usuario, $senha_db, $bd);

    // Verificando a conexão
    if (!$conexao) {
        die(json_encode(array("error" => "Erro de conexão com o banco de dados: " . mysqli_connect_error())));
    }

    //verificar o login
    $query = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $resultado_login = mysqli_query($conexao, $query);

    if(mysqli_num_rows($resultado_login) == 1) {
    
        $usuario = mysqli_fetch_assoc($resultado_login);
        $token = md5(uniqid(rand(), true));
        $criado = date('Y-m-d H:i:s');
        $expira = date('Y-m-d H:i:s', strtotime($criado . ' +1 day'));
        $query_insert = "INSERT INTO login_control (id, token, criado, expira) VALUES ('{$usuario['ID']}', '$token', '$criado', '$expira')";
        if(mysqli_query($conexao, $query_insert)) {
            echo json_encode(array("token" => $token));
           // header("Location: ../view/index.php");
        } else {
            echo json_encode(array("error" => "Erro ao inserir dados na tabela de controle de login!"));
        }
    } else {
        echo json_encode(array("error" => "Login inválido!"));
    }
} else {
    echo json_encode(array("error" => "Dados de login não fornecidos!"));
}
?>