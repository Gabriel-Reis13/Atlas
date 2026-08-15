<?php
session_start();
require "conexao.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
$consultaCategorias = "SELECT * FROM categorias";

$prepararConsultaCategorias = $conexao->prepare($consultaCategorias);

$prepararConsultaCategorias->execute();

$categorias = $prepararConsultaCategorias->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias chamados</title>
</head>
<body>
    <h1>Atlas</h1>
    <h2>Categorias</H2>
<table border="1"><!--cria tabela-->

    <tr><!--cria linhas-->
        <th>ID</th><!--cabeçalho de tabelas-->
        <th>Nome</th>
        <th>Status</th>
    </tr>

    <?php foreach ($categorias as $categorias) { ?>

        <tr>
            <td><?php echo $categorias['id'];?></td>
            <td><?php echo $categorias['nome']; ?></td>
            <td><?php echo $categorias['status']; ?></td>
        </tr>

    <?php } ?>

</table>

</body>
</html>
