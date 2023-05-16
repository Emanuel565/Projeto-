<?php
// Iniciar a sessão
@session_start();
// Incluir o arquivo de conexão com o banco de dados
require_once('./connect.php');

// Obter os dados do formulário de login
$email = $_POST['email'];
$password = $_POST['password'];

// Verificar se algum campo obrigatório está vazio
if ( empty($email) || empty($password)) {
    exit("Um ou mais campos obrigatórios estão vazios.");
}

// Gerar o hash da senha usando o algoritmo SHA-256
$hash_password = hash('sha256', $password);

// Preparar a consulta para verificar se o usuário existe no banco de dados com o e-mail e senha fornecidos
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND hash_password = :hash_password");
$stmt->bindParam(':email', $email); // Vincular o parâmetro de e-mail
$stmt->bindParam(':hash_password', $hash_password); // Vincular o parâmetro de senha
$stmt->execute(); // Executar a consulta

// Se houver um usuário correspondente no banco de dados
if ($stmt->rowCount() > 0) {
    // Obter o usuário como um array associativo
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // Armazenar o nome do usuário na sessão
    $_SESSION['user_name'] = $user['fullname'];
   
    // Retornar "Sucesso" se o login for bem-sucedido
    echo "Sucesso";
    	
} else {
    // Retornar "E-mail ou senha incorretos" se o login falhar
    echo "E-mail ou senha incorretos.";
}
?>
