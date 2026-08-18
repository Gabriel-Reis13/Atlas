<?php
session_start();
require "conexao.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
$consultaPrioridades = "SELECT * FROM prioridades where status =1";

$prepararConsultaPrioridades = $conexao->prepare($consultaPrioridades);

$prepararConsultaPrioridades->execute();

$prioridades = $prepararConsultaPrioridades->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prioridades</title>
</head>
<body>
        <h1>Atlas</h1>
    <h2>Prioridades</H2>
<table border="1"><!--cria tabela-->

    <tr><!--cria linhas-->
        <th>ID</th><!--cabeçalho de tabelas-->
        <th>Prioridade</th>
        <th>Status</th>
    </tr>

    <?php foreach ($prioridades as $prioridade) { ?>

        <tr>
            <td><?php echo $prioridade['id'];?></td>
            <td><?php echo $prioridade['prioridade']; ?></td>
            <td><?php echo $prioridade['status']; ?></td>
        </tr>

    <?php } ?>

</table>
</body>
</html>