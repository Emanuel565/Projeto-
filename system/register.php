<?php
// Incluir o arquivo de conexão com o banco de dados
require_once('./connect.php');

// Obter os dados do formulário
$name = $_POST['fullname'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$password = $_POST['password'];
$passwordConfirm = $_POST['password_confirm'];

// Verificar se algum campo obrigatório está vazio
if (empty($name) || empty($email) || empty($password) || empty($passwordConfirm) || empty($telefone)  || empty($endereco) ) {
    exit("Um ou mais campos obrigatórios estão vazios.");
}

// Verificar se as senhas inseridas são iguais
if ($password != $passwordConfirm) {
    exit('As senhas não coincidem!');
}

// Guardar a senha usando o algoritmo SHA-256
$hash_password = hash('sha256', $password);

// Verificar se o email já existe no banco de dados
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

// Se o email já estiver cadastrado
if ($stmt->rowCount() > 0) {
    echo "O e-mail já está cadastrado.";
} else {
    // Se o email não estiver cadastrado, inserir o novo usuário no banco de dados
    $query = "INSERT INTO users (fullname, email, hash_password, created_at, telefone, endereco )
              VALUES (:fullname, :email, :hash_password, now(), :telefone, :endereco)";

    $stmt = $pdo->prepare($query);

    // Vincular os parâmetros do usuário
    $stmt->bindParam(':fullname', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':hash_password', $hash_password);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);


    // Executar a consulta e verificar se foi bem-sucedida
    if ($stmt->execute()) {
        echo "Sucesso";
    } else {
        echo "Ocorreu um erro ao tentar cadastrar o usuário.";
    }
}
