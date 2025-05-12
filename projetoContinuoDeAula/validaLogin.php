<?php
session_start();

$_SESSION['usuarioLogado'] = false;

$login = $_GET['login'];
$senha = $_GET['senha'];

if (!(empty($login) OR empty($senha))) // testa se os campos do formulário não estão vazios
{
    include "conecta.php";

    $stmt = $pdo->query("select * from pessoa where email = '$login' and senha = '$senha'");
    // $dados = array(':email' => $login, ':senha' => $senha);
    $resultado = $stmt -> fetch();
    // "select * from pessoa where email='$login' and senha = '$senha'";
    
    // $resultado = mysqli_query($conexao, $sql);

    echo $resultado['email'];
    
    if(mysqli_num_rows($resultado)==1)
    {
    
        $_SESSION['usuarioLogado'] = true;
        $_SESSION['login'] = $login;
        echo "Logou";
        header("Location: index.php");
    
    }
    else
    {
        echo "Não Logou";
        header("Location: login.php");
        $_SESSION['usuarioLogado'] = false;
    }

}else {
    echo "Não Logou 2";
    header("Location: login.php");
    $_SESSION['usuarioLogado'] = false;
}