<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$name = $_POST['name'];
$password = $_POST['password'];
$employeeNames = $_POST['employeeName'];

// Inserir dados na tabela principal
$sql = "INSERT INTO sua_tabela_principal (name, password) VALUES ('$name', '$password')";
if ($conn->query($sql) === TRUE) {
    $lastId = $conn->insert_id;

    // Inserir dados na tabela de funcionários usando o último ID inserido
    foreach ($employeeNames as $employeeName) {
        $sql = "INSERT INTO sua_tabela_de_funcionarios (registration_id, employee_name) VALUES ('$lastId', '$employeeName')";
        $conn->query($sql);
    }

    echo "Registro salvo com sucesso!";
} else {
    echo "Erro ao salvar o registro: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
