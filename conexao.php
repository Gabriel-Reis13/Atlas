<?php

$servidor = "localhost";
$banco = "atlas";
$usuario = "root";
$senha = "";
$mensagemConexao;
$conexao = new PDO(
    "mysql:host=$servidor;dbname=$banco;charset=utf8mb4",
    $usuario,
    $senha
);
if(isset($conexao)){
    $mensagemConexao = "banco conectado";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexao</title>
</head>
<body>
    
</body>
</html>