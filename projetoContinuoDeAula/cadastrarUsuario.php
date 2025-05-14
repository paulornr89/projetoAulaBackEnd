<?php
    session_start();
    
    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))) {    
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }
?>

<ul>
    <li><a target="_self" href='./listagem_usuario.php'>Edição de Usuários</a></li>
    <li><a target="_self" href='./consultaUsuario.php'>Consulta de Usuários</a></li>
    <li><a target="_self" href="./listagem_usuario.php">Lista Usuários</a></li>
    <li><a target="_self" href="./cadastrarUsuario.php">Cadastrar Usuário</a></li>
    <li><a target="_self" href="./index.php">Home</a></li>
</ul>

<form action="cadastro_usuario.php" method="POST" enctype="multipart/form-data">
    Nome : <input type="text" name="nome">
    Email : <input type="text" name="email">
    CPF: <input type="text" name="cpf">
    Senha: <input type="password" name="senha">
    <input type="hidden" name ="MAX_FILE_SIZE" value="5000000"/>
    Foto: <input type="file" name="fotoPerfil">
    <input type="reset" name="botao" value="Limpar">
    <input type="submit" name="botao" value="Enviar">
</form>