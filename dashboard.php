<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
<h1>Atlas serviceDesk</h1>
<p>Bem vindo, <?php
echo $_SESSION['usuario'];?></p>

<ul>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="meus_chamados.php">Meus Chamados</a></li>
    <li><a href="novo_chamado.php">Abrir Chamado</a></li>
    <li><a href="usuarios.php">Usuários</a></li>
    <li><a href="categorias.php">Categorias</a></li>
    <li><a href="prioridades.php">Prioridades</a></li>
    <li><a href="logout.php">Sair</a></li>
</ul>

</body>
</html>