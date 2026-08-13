<?php
session_start();
require "conexao.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
$idChamado = $_GET['id'];
$consultaChamado = "SELECT *FROM chamados WHERE id = ? AND solicitante = ?";
$prepararConsultaChamado = $conexao->prepare($consultaChamado);
$prepararConsultaChamado->execute([$idChamado,
$_SESSION['usuario']]);
$chamado = $prepararConsultaChamado->fetch();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ATLAS</h1>
<h1>Detalhes do Chamado</h1>

<p>Título: <?php echo $chamado['titulo']; ?></p>

<p>Descrição: <?php echo $chamado['descricao']; ?></p>

<p>Categoria: <?php echo $chamado['categoria']; ?></p>

<p>Prioridade: <?php echo $chamado['prioridade']; ?></p>

<p>Status: <?php echo $chamado['status']; ?></p>

<p>Responsável: <?php echo $chamado['responsavel']; ?></p>

<p>Data de abertura: <?php echo $chamado['data_abertura']; ?></p>

<a href="editar_chamado.php?id=<?php echo $chamado['id']; ?>">
    Editar chamado
</a>
</body>
</html>