<?php
session_start();

// Destruir a sessão
session_destroy();

// Limpar o cookie de sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirecionar para a página de login
header("Location: http://localhost/Atividade%20Front/atividade-29-04/view/login.php");
exit();
?>