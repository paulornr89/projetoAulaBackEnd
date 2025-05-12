<?php
session_start();

if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
    header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}
include "../conecta.php";
if($_POST['acao']=='editar')
{

    $codproduto= $_POST['codproduto'];
    $nomeprod= $_POST['nomeprod'];
    $descprod=$_POST['descprod'];

    $SQL= "update produto set nomeprod='$nomeprod', descprod='$descprod' where codproduto = '$codproduto'";
    //echo $SQL;

    $resultado=mysqli_query($conexao,$SQL);

    if($resultado)
    {
       echo "Alteração Efetuada com sucesso";
    }
    else
    {
       echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
       echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
    }

}
else
{


  if($_POST['acao']=='excluir')
  {

    $codproduto= $_POST['codproduto'];

    $SQL= "delete from produto where codproduto = '$codproduto'";
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
<br><a href='./listaProdutos.php'>Voltar </a>


