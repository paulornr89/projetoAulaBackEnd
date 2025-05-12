<?php
    session_start();

    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))) {
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }
?>
<a href='./usuario.php'>Voltar </a>

<h3>Consulta Usuário</h3>

<br><br>
<form action="listaPorConsulta.php" method="post">
    <div>
        Nome:<br>
        <input type="text" name="nome"/>
    </div>
    <div>
        CPF:<br>
        <input type="text" name="cpf"/>
    </div><br>
    <button type="submit">Consultar</button>
</form>