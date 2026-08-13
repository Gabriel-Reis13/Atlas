<?php
session_start();
require "conexao.php";
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
$consultaBuscarChamado = "SELECT * FROM chamados WHERE solicitante = ?";
$prepararConsultaChamado = $conexao->prepare($consultaBuscarChamado);
$prepararConsultaChamado-> execute ([$_SESSION['usuario']]);
$chamadosEncontrados = $prepararConsultaChamado-> fetchALL();
$mensagemConsulta= "";
if(empty($chamadosEncontrados)){
    $mensagemConsulta = "Não existem chamados atribuidos a você";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus chamados</title>
</head>
<body>
    <h1>ATLAS</h1>
    <h2>Meus chamados</h2>
<table border="1"><!--cria tabela-->

    <tr><!--cria linhas-->
        <th>ID</th><!--cabeçalho de tabelas-->
        <th>Título</th>
        <th>Categoria</th>
        <th>Prioridade</th>
        <th>Status</th>
        <th>Responsável</th>
        <th>Data de abertura</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($chamadosEncontrados as $chamado) { ?>

        <tr>
            <td><?php echo $chamado['id'];?></td>
            <td><?php echo $chamado['titulo']; ?></td>
            <td><?php echo $chamado['categoria']; ?></td>
            <td><?php echo $chamado['prioridade']; ?></td>
            <td><?php echo $chamado['status']; ?></td>
            <td><?php echo $chamado['responsavel']; ?></td>
            <td><?php echo $chamado['data_abertura']; ?></td>
            <td><a href="detalhes_chamado.php?id=<?php echo $chamado['id']?>">
                Ver detalhes
                </a>
            </td>
        </tr>

    <?php } ?>

</table>
</body>
</html>