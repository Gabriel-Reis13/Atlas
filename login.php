<?php

require "conexao.php";

session_start();

$mensagemErro = "";

if (isset($_POST['email']) && isset($_POST['password'])) {

    // Dados digitados pelo usuário
    $emailDigitado = $_POST['email'];
    $senhaDigitada = $_POST['password'];

    // Consulta SQL
    $consultaBuscarUsuario = "SELECT * FROM usuarios WHERE email = ?";

    // Prepara a consulta
    $consultaPreparada = $conexao->prepare($consultaBuscarUsuario);

    // Executa a consulta enviando o e-mail digitado
    $consultaPreparada->execute([$emailDigitado]);

    // Recebe o resultado da consulta
    $usuarioEncontrado = $consultaPreparada->fetch();

    // Verifica se encontrou um usuário
    if ($usuarioEncontrado) {

        // Compara a senha digitada com a senha cadastrada
        if ($senhaDigitada == $usuarioEncontrado['senha']) {

            $_SESSION['usuario'] = $usuarioEncontrado['nome'];

            header("Location: dashboard.php");
            exit();

        } else {

            $mensagemErro = "Senha incorreta.";

        }

    } else {

        $mensagemErro = "Usuário não encontrado.";

    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela do login Atlas</title>
</head>
<body>
    <h1>Atlas serviceDesk</h1>
    <h2>Bem vindo de volta!</h2>
<p><?php
    echo $mensagemErro;
    ?>
</p>
    <form action="login.php" method="POST">
        
        <label for="email">Insira seu email</label>
        <input type="email" id="email" name="email" required placeholder="digite seu email"> 
        <label for="password" >Insira sua senha</label>
        <input type="password" id="password"name="password" required placeholder="digite sua senha">
        
        <button type="submit">Entrar</button>
    </form>

<a href="">esqueceu a senha?</a>

</body>
</html>