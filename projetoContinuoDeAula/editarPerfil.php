<br><a href='./index.php'>Voltar </a>

<?php
    include "conecta.php";
   // session_destroy();  
    session_start();

    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }

    $email = $_SESSION['login'];

    $sql = "select * from pessoa where email = '$email'";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        $usuario = mysqli_fetch_assoc($resultado);
?>
<br>
<br>
<h3>Editar Perfil - <?php echo $usuario['nome']?></h3>

<form action="edicao_usuario.php" method="POST" enctype="multipart/form-data">
    <p><img width="100px" height="100px" src="./assets/perfil/<?php echo $usuario['imagem']?>">
        <br><input type="hidden" name ="MAX_FILE_SIZE" value="500000000"/>
        <input type="file" name="fotoPerfil"/>
        <input type="hidden" name="imagemAtual" value="<?php echo $usuario['imagem']?>"/>
    </p>
    <p>Código: <?php echo $usuario['codpessoa']?>
        <input type="hidden" name="codpessoa" value="<?php echo $usuario['codpessoa']?>"/>
    </p>
    <p>Nome: <br><input type="text" name="nome" value="<?php echo $usuario['nome']?>"/></p>
    <p>E-mail: <br><input type="text" name="email" value="<?php echo $usuario['email']?>"/></p>
    <p>CPF: <br><input type="text" name="cpf" value="<?php echo $usuario['cpf']?>"/></p>
    <p>Senha: <br><input type="text" name="senha" value="<?php echo $usuario['senha']?>"/></p>
    <button type="submit" name="acao" value="editar"> Editar </button>
</form>
<?php
    }
?>