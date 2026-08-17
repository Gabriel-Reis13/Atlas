<?php
session_start();
require "conexao.php";
date_default_timezone_set('America/Sao_Paulo');
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}$concultaCategoria = "SELECT *FROM categorias WHERE status =1";
$prepararConsultaCategoria = $conexao->prepare($concultaCategoria);
$prepararConsultaCategoria->execute();
$categorias = $prepararConsultaCategoria->fetchAll();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
$mensagem = "";
if(isset($_POST['titulo'])){
   $tituloChamado = $_POST['titulo'];
    $responsavelChamado = $_POST['responsavel'];
    $categoriaChamado = $_POST['categoria'];
    $prioridadeChamado = $_POST['prioridade'];
    $descricaoChamado = $_POST['descricao'];
$mensagem = "Chamado aberto com sucesso!<br><br>

Título: $tituloChamado <br>
Categoria: $categoriaChamado <br>
Prioridade: $prioridadeChamado <br>
Responsável: $responsavelChamado <br>
Descrição: $descricaoChamado";


$inserirDadosChamado = "INSERT INTO chamados
(titulo,descricao, categoria, prioridade,	status,	solicitante, responsavel, data_abertura	
)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$preparandoInsercaoChamado = $conexao->prepare($inserirDadosChamado);
$preparandoInsercaoChamado->execute([
    $tituloChamado,
    $descricaoChamado,
    $categoriaChamado,
    $prioridadeChamado,
    "aberto",
    $_SESSION['usuario'],
    $responsavelChamado,
    date("Y-m-d H:i:s")

]);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Chamado</title>
</head>
<body>
    <h1>Novo Chamado</h1>
    <form action="" method="POST">
        <label for="titulo" >Titulo</label>
        <input required type="text" name="titulo" id="titulo" placeholder="insira o Título do chamado">
        
        <label for="prioridade">Selecione a prioridade do chamado</label>
        <select name="prioridade" id="prioridade" required>
            <option value="">Selecione a prioridade</option>
             <option value= "baixa">Baixa</option>
             <option value= "media">Média</option>
             <option value= "alta">Alta</option>
             <option value= "critica">Crítica</option>
          </select>

          <label for="categoria">Selecione a categoria do chamado</label>
        <select name="categoria" id="categoria" required>
           
        <?php
        foreach($categorias as $categorias){?>
    <option value="<?php echo $categorias['nome']?>"><?php echo $categorias['nome']?></option>
       <?php }
        ?>
          </select>

          <label for="descricao" >Descrição</label>
        <textarea required name="descricao" id="descricao" rows="6" cols="50" placeholder="descreva o problema"></textarea>

        <label for="responsavel">Selecione o responsavel do chamado</label>
        <select name="responsavel" id="responsavel" required>
             <option value="">Selecione o responsavel</option>
             <option value= "gabriel">Gabriel</option>
             <option value= "fulano">Fulano</option>
        </select>
       
       
        <button type="submit">Salvar</button>
    </form>
    <?php echo $mensagem;?>
</body>
</html>