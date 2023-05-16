<?php
// Incluir o arquivo de conexão com o banco de dados
require_once('./system/connect.php');
// Incluir o arquivo de verificação (contém a lógica para verificar se o usuário está logado e obter seu nome)
require_once('./system/check.php');

// Exibir o nome do usuário (a variável $userName é definida no arquivo check.php)
// echo $userName;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Matrix <?php echo $userName ?></title>
</head>

<body>
    <p id="demo"></p>
    <canvas id="matrixCanvas"></canvas>
    <script src="js/letter.js"></script>
    <script src="js/matrix.js"></script>
    
    <script>
        // Exemplo de uso da função typeWriter:
        typeWriter('Olá,Bem vindo ao Banco Emprees <?php echo $userName ?>...', 'demo');
    </script>
<?php include 'calculo.html';?>

</body>

</html>