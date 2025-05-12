<br><a href='../index.php'>Voltar </a>
<br><a href='./listaProdutos.php'>Produtos </a>
<?php

session_start();

if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
    header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

$nomeProd=$_POST['nomeProd'];
$descProd=$_POST['descProd'];
$imagemProduto = $_FILES['imagemProduto'];
$nome_arquivo = $_FILES['imagemProduto']['name'];
$tipo_arquivo = explode(".",$nome_arquivo);
$arquivo_temporario = $_FILES['imagemProduto']['tmp_name'];
$novoNome = $nomeProd.".".$tipo_arquivo[1];

include "../conecta.php";
if (!empty($nome_arquivo)) {

   if (move_uploaded_file($arquivo_temporario, "../assets/produto/$novoNome")) {//depois que salva o arquivo no servidor é que vai salvar no banco
      $sql = "insert into produto (nomeprod, descprod, imagem) values ('$nomeProd','$descProd','$novoNome')";

      $resultado = mysqli_query($conexao, $sql);

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
