<?php


// $conexao = mysqli_connect('localhost', 'root', '','aula');// conexão pelo método procedural - pela utilização de uma função
// mysqli_set_charset($conexao,"utf8");

try {
    $pdo = new PDO("mysql:host=localhost; dbname=aula; charset=utf8", "root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
}catch(PDOException $e) {
    print $e->getMessage();
}

// if (!$conexao) {
//     die('Não foi possível conectar: '); // função que mostra os erros de sql da conexão
// }
?>