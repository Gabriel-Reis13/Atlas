<?php
session_start();
require "conexao.php";
if(!isset($_SESSION['usuario'])){
    header ("location: login.php");
    exit();
}
$consultaUsuarios = "SELECT *FROM usuarios WHERE status =1";
$prepararConsultaUsuario= $conexao->prepare($consultaUsuarios);
$prepararConsultaUsuario->execute();
$usuarios = $prepararConsultaUsuario->fetchAll();

$consultaPrioridades = "SELECT * FROM prioridades where status =1";

$prepararConsultaPrioridades = $conexao->prepare($consultaPrioridades);

$prepararConsultaPrioridades->execute();

$prioridades = $prepararConsultaPrioridades->fetchAll();

$consultaCategoria = "SELECT *FROM categorias where status = 1";
$prepararConsultaCategoria = $conexao->prepare($consultaCategoria);
$prepararConsultaCategoria-> execute();
$categorias = $prepararConsultaCategoria->fetchAll();
$idChamado = $_GET['id'];

$consultaChamado = "SELECT * FROM chamados
                    WHERE id = ?
                    AND solicitante = ?";

$prepararConsultaChamado = $conexao->prepare($consultaChamado);

$prepararConsultaChamado->execute([
    $idChamado,
    $_SESSION['usuario']
]);

$chamado = $prepararConsultaChamado->fetch();


if (isset($_POST['titulo'])) {

    $tituloEditado = $_POST['titulo'];
    $prioridadeEditada = $_POST['prioridade'];
    $descricaoEditada = $_POST['descricao'];
    $responsavelEditado = $_POST['responsavel'];
    $categoriaEditada = $_POST['categoria'];

    $atualizarChamado = "UPDATE chamados
                         SET
                            titulo = ?,
                            descricao = ?,
                            categoria = ?,
                            prioridade = ?,
                            responsavel = ?
                         WHERE id = ?
                         AND solicitante = ?";

    $prepararAtualizarChamado = $conexao->prepare($atualizarChamado);

    $prepararAtualizarChamado->execute([
        $tituloEditado,
        $descricaoEditada,
        $categoriaEditada,
        $prioridadeEditada,
        $responsavelEditado,
        $idChamado,
        $_SESSION['usuario']
    ]);
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar chamado</title>
</head>
<body>
<h1>ATLAS</h1>
<H2>EDITAR CHAMADO</H2>
<p>ID do chamado: <?php echo $idChamado;?></p>


<form action="" method ="POST">
    <label for="titulo">Titulo</label>
    <input id= "titulo"type="text" name ="titulo" VALUE ="<?php echo $chamado['titulo']?>">

    <label for="prioridade">Selecione a prioridade do chamado</label>
        <select name="prioridade" id="prioridade" required>

            <?php foreach ($prioridades as $prioridade) { ?>

    <option
    value="<?php echo $prioridade['prioridade']; ?>"
    <?php if ($prioridade['prioridade'] == $chamado['prioridade']) {
        echo 'selected';
    } ?>
>
    <?php echo $prioridade['prioridade']; ?>
</option>

<?php } ?>
    
</select>

<label for="categoria">Selecione a categoria</label>

<select name="categoria" id="categoria" required>

    <option value="">Selecione a categoria</option>

    <?php foreach ($categorias as $categoria) { ?>

        <option value="<?php echo $categoria['nome']; ?>"
            <?php if ($categoria['nome'] == $chamado['categoria']) {
                echo 'selected';
            } ?>
        >
            <?php echo $categoria['nome']; ?>
        </option>

    <?php } ?>

</select>
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao"><?php echo $chamado['descricao']?></textarea>

<label for="responsavel">Selecione o responsável do chamado</label>

<select name="responsavel" id="responsavel" required>
    <?php foreach ($usuarios as $usuario) { ?>

        <option
            value="<?php echo $usuario['id']; ?>"
            <?php if ($usuario['id'] == $chamado['responsavel']) {
                echo 'selected';
            } ?>
        >
            <?php echo $usuario['nome']; ?>
        </option>

    <?php } ?>

</select>
       
        <button type="submit">Salvar</button>

        <?php //header("location: meus_chamados.php");
        //exit();?>
</form>
    
</body>
</html>