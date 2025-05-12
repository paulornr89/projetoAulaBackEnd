<?php
session_start();

if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
    header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

?>
<h3>Menu</h3>
    <ul>
        <li><a target="_self" href="./usuario.php">Usuário</a></li>
        <li><a target="_self" href="./editarPerfil.php">Editar Perfil</a></li>
        <li><a target="_self" href="./produto/produto.php">Produto</a></li>
    </ul>
<a href='sair.php'>Sair</a>