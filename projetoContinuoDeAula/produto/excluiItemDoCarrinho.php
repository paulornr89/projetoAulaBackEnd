<?php
    session_start();

    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }

    $codproduto = $_POST['codproduto'];

    if(isset($_SESSION['carrinho'][$codproduto])) {
        unset($_SESSION['carrinho'][$codproduto]);
        header("Location:consultarCarrinho.php");
    }
?>