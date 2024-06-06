<?php
session_start();

// Verificar se o token está presente na sessão
if (!isset($_SESSION['token'])) {
    // Redirecionar para a página de login se o token não estiver presente
    header("Location: http://localhost/Atividade%20Front/atividade-29-04/view/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calculadora</title>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
<div class="card p-4">
    <h2 class="mb-4">Calculadora</h2>
    <form id="calculator-form">
        <div class="d-flex justify-content-between align-items-center">
            <input type="number" id="num1" class="form-control" required>
            <select id="operator" class="form-select mx-3" required>
                <option value="soma">+</option>
                <option value="subtrair">-</option>
                <option value="multiplicar">*</option>
                <option value="dividir">/</option>
            </select>
            <input type="number" id="num2" class="form-control" required>
            <button type="button" id="calculate" class="btn btn-primary ms-3">Calcular</button>
        </div>
    </form>
    <p id="result" class="mt-3"></p>
    <button id="logout" class="btn btn-secondary mt-3">Logout</button>
</div>
<script>
$(document).ready(function(){
    $('#calculate').on('click', function(){
        var num1 = $('#num1').val();
        var num2 = $('#num2').val();
        var operator = $('#operator').val();

        $.ajax({
            type: 'POST',
            url: 'calcular.php',
            data: {num1: num1, num2: num2, operator: operator},
            success: function(response) {
                $('#result').text('Resultado: ' + response);
            }
        });
    });

    $('#logout').on('click', function(){
        window.location.href = 'http://localhost/Atividade%20Front/atividade-29-04/controll/logout.php';
    });
});
</script>
</body>
</html>