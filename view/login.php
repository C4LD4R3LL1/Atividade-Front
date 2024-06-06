<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card my-5 p-4">
                <div id="loginContainer">
                    <h5 class="card-title text-center mb-4">Entrar</h5>
                    <form id="loginForm" class="login-form" action="../controll/verificaLogin.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Password" required>
                            <label for="senha">Senha</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                            <label class="form-check-label" for="rememberPasswordCheck">Lembrar Senha</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="login">Entrar</button>
                        </div>
                    </form>
                </div>
                <div class="text-center mt-3">
                    <button id="paginaCadastro" type="button" class="btn btn-primary btn-login text-uppercase fw-bold" onclick="redirecionarParaPaginaDeCadastro()">Não possui cadastro?</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function redirecionarParaPaginaDeCadastro() {
    window.location.href = '../view/cadastro.php'; // Certifique-se de que o caminho para a página de cadastro está correto
}
</script>
</body>
</html>
