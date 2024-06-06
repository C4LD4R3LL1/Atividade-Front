<?php
class Banco {
    private $host;
    private $bd;
    private $usuario;
    private $senha;
    private $conexao;
    public function __construct()
    {
        $this->host = "localhost";
        $this->bd = "cadastro_usuario";
        $this->usuario = "root"; 
        $this->senha = "";
        $this->conectar();
    }
    private function conectar(){
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->bd);
        // Verificando a conexão
    if ($this->conexao->connect_error) {
            die("Erro de conexão com o banco de dados: " . $this->conexao->connect_error);
        }
    }
    public function consultar($query, $params = [])
    {
        $stmt = $this->conexao->prepare($query);
        if ($stmt === false) {
            die("Erro ao preparar a query: " . $this->conexao->error);
        }

        if ($params) {
            $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        }

        $stmt->execute();
        $resultado = $stmt->get_result();
        $dados = $resultado->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $dados;
    }
}
?>