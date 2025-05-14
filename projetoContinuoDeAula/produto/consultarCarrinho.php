<link rel="stylesheet" href="../style.css">
<ul class="menu">
    <li><a target="_self" href="../index.php">Home</a></li>
    <li><a target="_self" href='apresentaProdutos.php'>Voltar </a><br></li>
</ul>
<form class="mostraCarrinho"  action="excluiItemDoCarrinho.php" method="post">
<?php
    include "../conecta.php";
    session_start();

    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }
    
    $total = 0;
    foreach($_SESSION['carrinho'] as $codproduto => $quantidade) {
        $resultado = $pdo->query("select * from produto where codproduto = '$codproduto'");
        $linha = $resultado->fetch();

        $total = $total + ($linha['valor'] * $quantidade);
?>
    <div class="miniCard">
            <img width="20px" height="20px" src="../assets/produto/<?php echo $linha['imagem']?>">
            <input type ="hidden" name = "codproduto" value="<?php echo $linha['codproduto']?>">
            <span><strong>Nome:</strong> <?php echo $linha['nomeprod']?></span>
            <span><strong>Marca:</strong> <?php echo $linha['marca']?></span>
            <span><strong>Desc: </strong> <?php echo $linha['descprod']?></span>
            <span><strong>Valor: </strong> <?php echo $linha['valor']?></span>
            <span><strong>Quantidade: </strong> <?php echo $quantidade?></span>
            <button type="submit"><img src="../assets/aplicacao/lixeira.png"></button>
    </div>
<?php
    }
?>
    <p class="valorTotal"><strong>Total:</strong> R&dollar; <?php echo str_replace(".", ",", $total)?></p>
</form>