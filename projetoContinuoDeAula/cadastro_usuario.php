<?php

session_start();

if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
    header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$fotoPerfil = $_FILES['fotoPerfil'];
$nome_arquivo = $_FILES['fotoPerfil']['name'];
$tipo_arquivo = explode(".",$nome_arquivo);
$arquivo_temporario = $_FILES['fotoPerfil']['tmp_name'];
$novoNome = $nome.".".$tipo_arquivo[1];

include "conecta.php";

if (!empty($nome_arquivo)) {

   if (move_uploaded_file($arquivo_temporario, "assets/perfil/$novoNome")) {//depois que salva o arquivo no servidor é que vai salvar no banco
      $sql="insert into pessoa (nome,email,cpf,senha, imagem) values ('$nome','$email','$cpf','$senha','$novoNome')";

      echo $sql;

      $resultado = mysqli_query($conexao,$sql);

      if($resultado)
      {
         echo "Cadastro Efetuado com sucesso";
      }
      else
      {
         echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
         echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
      }
      //echo " Upload do arquivo: ". $nome_arquivo."concluído com sucesso"; 
   } else {
      die( "Falha no envio do arquivo"); 
   }
} else {
   die("Selecione o arquivo a ser enviado"); 
}
   


?>
<br><a href='index.php'>Voltar </a>