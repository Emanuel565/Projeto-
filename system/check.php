<?php
@session_start();

if (isset($_SESSION['user_name'])) {
    // O usuário está logado, você pode acessar as informações do usuário
    $userName = $_SESSION['user_name'];
}
else{
    //se o usuário não tiver feito a autenticação, então redireciona para o login
    header('Location: ./login.html');
}