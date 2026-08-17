<?php
session_start();
require "conexao.php";
if(!isset($_SESSION['usuario'])){
    header ("location: login.php");
    exit();
}

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
             <option value= "baixa"<?php if("baixa" == $chamado['prioridade']){ echo 'selected';}?>>Baixa</option>
             <option value= "media"<?php if("media" == $chamado['prioridade']){ echo 'selected';}?>>Média</option>
             <option value= "alta"<?php if("alta" == $chamado['prioridade']){ echo 'selected';}?>>Alta</option>
             <option value= "critica"<?php if("critica" == $chamado['prioridade']){ echo 'selected';}?>>Crítica</option>
          </select>
    


    <label for="categoria">Selecione a categoria do chamado</label>

<select name="categoria" id="categoria" required>

    <option value="">Selecione a categoria</option>

    <?php foreach ($categorias as $categoria) { ?>

        <option
            value="<?php echo $categoria['nome']; ?>"
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

    <label for="responsavel">Selecione o responsavel do chamado</label>
        <select name="responsavel" id="responsavel" required>
             <option value= "gabriel"<?php if ("gabriel" == $chamado['responsavel']){echo 'selected';}?>>Gabriel</option>
             <option value= "fulano" <?php if ("fulano" == $chamado['responsavel']){echo 'selected';}?>>Fulano</option>
        </select>
        <button type="submit">Salvar</button>

        <?php //header("location: meus_chamados.php");
        //exit();?>
</form>
    
</body>
</html>