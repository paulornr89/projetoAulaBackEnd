<?php
session_start();

$_SESSION['usuarioLogado'] = false;

$login = $_GET['login'];
$senha = $_GET['senha'];

if (!(empty($login) OR empty($senha))) {// testa se os campos do formulário não estão vazios
    include "conecta.php";

    $stmt = $pdo->query("select * from pessoa where email = '$login' and senha = '$senha'");
    
    if($stmt -> rowCount() == 1) {//verifica se a consulta retornou alguma linha
        $resultado = $stmt -> fetch();

        if($resultado['email'] == $login){
            $_SESSION['usuarioLogado'] = true;
            $_SESSION['login'] = $login;
            echo "Logou";
            header("Location: index.php");
        
        } else {
            echo "Não Logou";
            header("Location: login.php");
            $_SESSION['usuarioLogado'] = false;
        }
    }

} else {
    echo "Não Logou 2";
    header("Location: login.php");
    $_SESSION['usuarioLogado'] = false;
}