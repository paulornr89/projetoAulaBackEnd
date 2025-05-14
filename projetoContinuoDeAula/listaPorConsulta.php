<ul>
    <li><a href='./consultaUsuario.php'>Voltar </a></li>
</ul>

<?php
    include "conecta.php";

    session_start();

    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))) {
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }
    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $sql = "";

    if($cpf != ""){
        $sql = "select * from pessoa where cpf = '$cpf'";
    }

    if($nome != ""){
        $sql = "select * from pessoa where lower(nome) like '%$nome%'";
    }

    if($sql != "") {
        $resultado = $pdo->query($sql);
        
        while($usuario = $resultado->fetch( PDO::FETCH_ASSOC ) ) {
?>
    <section style="border: solid 0.5px black; width:fit-content;">
        <p><img width="100px" height="100px" src="./assets/perfil/<?php echo $usuario["imagem"]?>"></p>
        <p>Nome: <?php echo $usuario["nome"] ?></p>
        <p>E-mail: <?php echo $usuario["email"] ?></p>
        <p>CPF: <?php echo $usuario["cpf"] ?></p>
    </section>
<?php            
        }
    }
?>