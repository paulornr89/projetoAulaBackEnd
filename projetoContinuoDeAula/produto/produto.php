<?php
    session_start();

    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    
    <a href='listaProdutos.php'>Produtos</a><br>
    <a href='../index.php'>Home</a>
    <form action="./cadastroProduto.php" method="POST" enctype="multipart/form-data">
        <h3>Incluir Produto</h3>
        Nome Produto : <input type="text" name="nomeProd">
        Descrição : <input type="text" name="descProd"><br><br>
        <input type="hidden" name ="MAX_FILE_SIZE" value="5000000"/>
        Imagem: <input type="file" name="imagemProduto"><br><br>
        <input type="reset" name="botao" value="Limpar">
        <input type="submit" name="botao" value="Enviar">
    </form>

</body>
</html>