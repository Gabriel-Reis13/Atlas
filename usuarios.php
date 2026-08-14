<?php

session_start();

require "conexao.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$consultaUsuarios = "SELECT * FROM usuarios";

$prepararConsultaUsuarios = $conexao->prepare($consultaUsuarios);

$prepararConsultaUsuarios->execute();

$usuarios = $prepararConsultaUsuarios->fetchAll();



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
   <table border="1"><!--cria tabela-->

    <tr><!--cria linhas-->
        <th>ID</th><!--cabeçalho de tabelas-->
        <th>nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>perfil</th>
        <th>status</th>
        
    </tr>

    <?php foreach ($usuarios as $usuario) { ?>

        <tr>
            <td><?php echo $usuario['id'];?></td>
            <td><?php echo $usuario['nome'];?></td>
            <td><?php echo $usuario['email'];?></td>
            <td><?php echo $usuario['senha'];?></td>
            <td><?php echo $usuario['perfil'];?></td>
            <td><?php echo $usuario['status'];?></td>   
        </tr>

    <?php } ?>

</table>
</body>
</html>