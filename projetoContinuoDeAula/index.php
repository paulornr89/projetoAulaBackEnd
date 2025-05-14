<link rel="stylesheet" href="./style.css">
<header>
    <h3>Página Inicial</h3>
</header>
<?php
session_start();

if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
    header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

?>
    <ul class="menu">
        <li><a target="_self" href="./usuario.php">Usuário</a></li>
        <li><a target="_self" href="./editarPerfil.php">Editar Perfil</a></li>
        <li><a target="_self" href="./produto/apresentaProdutos.php">Produtos</a></li>
        <li><a href='sair.php'>Sair</a></li>
    </ul>
    