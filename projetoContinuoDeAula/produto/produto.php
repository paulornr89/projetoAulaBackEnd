<link rel="stylesheet" href="../style.css">
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
        <header>
        <h3>Cadastro de Produto</h3>
        </header>
        <main>
            <ul class="menu">
                <li><a target="_self" href="../index.php">Home</a></li>
                <li><a target="_self" href='apresentaProdutos.php'>Produtos</a><br></li>
            </ul>
            
            <form action="./cadastroProduto.php" method="POST" enctype="multipart/form-data">
                <p>Nome Produto : <input type="text" name="nomeProd"></p>                
                <p>Descrição : <input type="text" name="descProd"></p>
                <p>Categoria : <select type="text" name="categoria">
                                    <option value="">Selecione uma opção...</option>
                                    <option>Eletrônicos</option>
                                    <option>Cozinha</option>
                                    <option>Casa</option>
                                    <option>Saúde</option>
                                </select>
                </p>
                <p>Marca : <input type="text" name="marca"></p>
                <div>
                    <input type="hidden" name ="MAX_FILE_SIZE" value="5000000"/>
                    Imagem: <input type="file" name="imagemProduto">
                </div>
                <div>
                    <input type="reset" name="botao" value="Limpar">
                    <input type="submit" name="botao" value="Enviar">
                </div>
            </form>
        </main>
    </body>
</html>