<?php
include "conecta.php";

session_start();

if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
    header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

if($_POST['acao'] == 'editar'){

   $codpessoa = $_POST['codpessoa'];
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $cpf = $_POST['cpf'];
   $senha = $_POST['senha'];
   $imagemAtual = $_POST['imagemAtual'];
   $fotoPerfil = $_FILES['fotoPerfil'];
   $nome_arquivo = $_FILES['fotoPerfil']['name'];
   $tipo_arquivo = explode(".",$nome_arquivo);
   $arquivo_temporario = $_FILES['fotoPerfil']['tmp_name'];
   $novoNome = $nome.".".$tipo_arquivo[1];

   if (!empty($nome_arquivo)) {
      if(move_uploaded_file($arquivo_temporario, "assets/perfil/$novoNome")) {
         $SQL = "update pessoa set nome='$nome', email='$email', cpf='$cpf', senha='$senha', imagem='$novoNome'  where codpessoa = '$codpessoa'";
         echo $SQL;
     
        $resultado = mysqli_query($conexao, $SQL);
     
        if($resultado) {
           echo "Alteração Efetuada com sucesso";
           header("Location: editarPerfil.php");
        } else {
           echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
           echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
        }
      } else {
         die( "Falha no envio do arquivo"); 
      }
   } else {
         $SQL = "update pessoa set nome='$nome', email='$email', cpf='$cpf', senha='$senha', imagem='$imagemAtual'  where codpessoa = '$codpessoa'";
         echo $SQL;
     
        $resultado = mysqli_query($conexao, $SQL);
     
        if($resultado) {
           echo "Alteração Efetuada com sucesso";
           header("Location: editarPerfil.php");
        } else {
           echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
           echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
        }
     // die("Selecione o arquivo a ser enviado"); 
   }

  
} else {

  if($_POST['acao']=='excluir')
  {

    $codpessoa= $_POST['codpessoa'];

    $SQL= "delete from pessoa where codpessoa = '$codpessoa'";
    //echo $SQL;

    $resultado=mysqli_query($conexao,$SQL);

    if($resultado)
    {
       echo "Exclusão Efetuada com sucesso";
    }
    else
    {
       echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
       echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
    }

}
}
?>
<!-- <br><a href='listagem_usuario.php'>Voltar </a> -->
<br><a href='editarPerfil.php'>Voltar </a>


