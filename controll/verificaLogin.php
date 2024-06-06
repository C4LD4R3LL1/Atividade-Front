<?php 
session_start();
header('Content-Type: application/json');

if (isset($_REQUEST["email"]) && isset($_REQUEST["senha"])) {
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["senha"];

    // Conectando ao banco de dados
    $host = "localhost";
    $bd = "cadastro_usuario";
    $usuario = "root";
    $senha_db = "";
    $conexao = new mysqli($host, $usuario, $senha_db, $bd);

    // Verificando a conexão
    if ($conexao->connect_error) {
        die(json_encode(array("error" => "Erro de conexão com o banco de dados: " . $conexao->connect_error)));
    }

    // Verificar o login
    $query = "SELECT * FROM usuarios WHERE Email = ? AND senha = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param('ss', $email, $senha);
    $stmt->execute();
    $resultado_login = $stmt->get_result();

    if ($resultado_login->num_rows == 1) {
        $usuario = $resultado_login->fetch_assoc();

        // Gerar um token seguro
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;

        $criado = date('Y-m-d H:i:s');
        $expira = date('Y-m-d H:i:s', strtotime($criado . ' +1 day'));

        $query_insert = "INSERT INTO login_control (id, token, criado, expira) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conexao->prepare($query_insert);
        $stmt_insert->bind_param('isss', $usuario['ID'], $token, $criado, $expira);

        if ($stmt_insert->execute()) {
            echo json_encode(array("success" => true));
            header("Location: ../view/index.php");
            exit();
        } else {
            echo json_encode(array("error" => "Erro ao inserir dados na tabela de controle de login!"));
        }
    } else {
        echo json_encode(array("error" => "Login inválido!"));
    }

    $stmt->close();
    $conexao->close();
} else {
    echo json_encode(array("error" => "Dados de login não fornecidos!"));
}
?>