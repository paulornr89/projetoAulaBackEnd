<?php
    session_start();

    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }

    $codproduto = $_POST['codproduto'];
    $quantidade = $_POST['quantidade'];
    
    echo "Código: $codproduto <br>quantidade: $quantidade";

    if(isset($codproduto) && isset($quantidade)) {
        if(!isset($_SESSION['carrinho'][$codproduto])) {//criando a variável para o carrinho
            $_SESSION['carrinho'][$codproduto] = $quantidade;
        }
    }
    header("Location:apresentaProdutos.php");
    //var_dump($_SESSION['carrinho'])
?>

<br><a target="_self" href="./apresentaProdutos.php">VOLTAR</a>