<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seu_banco_de_dados";


$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para autenticação
$sql = "SELECT id, name, password FROM sua_tabela_principal WHERE name = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    $user_name = $row['name'];


    $subdomain = strtolower(str_replace(' ', '', $user_name));
    header("Location: http://$subdomain.localhost/dashboard.php");
    exit();
} else {
    // Falha na autenticação
    echo "Nome de usuário ou senha incorretos";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
