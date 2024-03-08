<?php
// Conexã
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "seu_banco_de_dados";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém o subdomínio da URL
$subdominio = explode('.', $_SERVER['HTTP_HOST'])[0];


$sql = "SELECT * FROM sua_tabela_principal WHERE name = '$subdominio'";
$resultado = $conn->query($sql);


if ($resultado->num_rows > 0) {
  
    $dados_empresa = $resultado->fetch_assoc();
    echo "Dados da Empresa: ";
    print_r($dados_empresa);
} else {
    echo "Empresa não encontrada";
}


$conn->close();
?>
