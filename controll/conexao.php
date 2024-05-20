<?php 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
$CON = $_POST["CON"];
if($CON == 1){
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$cpf = $_POST["cpf"];
$whatsapp = $_POST["whatsapp"];
$foto = $_POST["foto"];
// Conectando ao banco de dados
$host = "localhost";
$bd = "cadastro_usuario";
$usuario = "root"; 
$senha = "";
$conexao = mysqli_connect($host, $usuario, $senha, $bd);
// Verificando a conexão
if (!$conexao) {
    die("Erro de conexão com o banco de dados: " . mysqli_connect_error());
}
// Query de inserção
$query = "INSERT INTO usuarios (nome, email, senha, cpf, whatsapp, foto) 
          VALUES ('$nome', '$email', '$senha', '$cpf', '$whatsapp', '$foto')";

// Executando a query
if (mysqli_query($conexao, $query)) {
    echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";
} else {
    echo "Erro ao cadastrar no banco de dados: " . mysqli_error($conexao);
}
// Fechando a conexão
mysqli_close($conexao);
}else{
?>
  <h3>Sem Permissão</h3>
<?php
}
?>