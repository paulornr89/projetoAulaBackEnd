<link rel="stylesheet" href="../style.css">
<div class="mostraMensagem">
   <?php
      session_start();

      if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
         header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
      }

      include "../conecta.php";

      if($_POST['acao'] == 'editar') {
         $codproduto = $_POST['codproduto'];
         $nomeprod = $_POST['nomeprod'];
         $descprod = $_POST['descprod'];
         $categoria = $_POST['categoria'];
         $marca = $_POST['marca'];
         $valor = $_POST['valor'];

         $resultado = $pdo->exec("update produto set nomeprod='$nomeprod', descprod='$descprod', categoria='$categoria', marca='$marca', valor='$valor' where codproduto = '$codproduto'");

         if($resultado) {
            echo "Alteração Efetuada com sucesso";
         } else  {
            echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
            echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
         }
      } else {
      if($_POST['acao'] == 'excluir') {
            $codproduto= $_POST['codproduto'];
            $resultado = $pdo->exec("delete from produto where codproduto = '$codproduto'");

            if($resultado) {
               echo "Exclusão Efetuada com sucesso";
            } else {
               echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
               echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
            }
         }
      }
   ?>

   <br><a href='./listaProdutos.php'>Voltar </a>
</div>


