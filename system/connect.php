<?php
require_once('config.php');
// Iniciando a conexão com o banco de dados
try {
    // Definindo as configurações do banco de dados
    $dsn = 'mysql:host='.$servername.';dbname='.$dbname; // Definindo o tipo de banco (mysql), host (localhost) e nome do banco (register)

    // Criando uma nova instância do objeto PDO com as configurações definidas
    $pdo = new PDO($dsn, $username, $password);

    // Definindo o modo de tratamento de erros como exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Conexão estabelecida com sucesso
} catch (PDOException $e) {
    // Exibindo a mensagem de erro, caso ocorra algum problema na conexão
    echo "Erro na conexão: " . $e->getMessage();
}
?>
