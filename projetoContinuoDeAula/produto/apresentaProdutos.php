<link rel="stylesheet" href="../style.css">
<header>
    <h3>Produtos</h3>
</header>
<ul class="menu">
    <li><a target="_self" href="../index.php">Home</a></li>
    <li><a target="_self" href='produto.php'>Cadastrar Produto</a><br></li>
    <li><a target="_self" href='listaProdutos.php'>Alterar Produtos</a><br></li>
    <li><a target="_self" href='consultarCarrinho.php'>Consultar Carrinho</a><br></li>
</ul>

<div class="mostraProdutosVenda">
    <?php
    session_start();

    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }

    include "../conecta.php";

    $resultado = $pdo->query("select * from produto order by codproduto");

    while($linha = $resultado->fetch( PDO::FETCH_ASSOC )) {
        $valorQuantidade = "";

        if(isset($_SESSION['carrinho'][$linha['codproduto']])) {//verifica se item já foi salvo no carrinho para recuperar o valor da quantidade
            $valorQuantidade = $_SESSION['carrinho'][$linha['codproduto']];
            //echo "<br>entrou para o produto:".$linha['codproduto']."<br> Valor quantidade: $valorQuantidade<br>";
        }
    ?>
        <form class="cardProduto" action="incluirNoCarrinho.php" method="post">
            <img width="100px" height="100px" src="../assets/produto/<?php echo $linha['imagem']?>">
            <input type ="hidden" name = "codproduto" value="<?php echo $linha['codproduto']?>">
            <p><strong>Nome:</strong> <span><?php echo $linha['nomeprod']?></span></p>
            <p><strong>Marca:</strong> <span><?php echo $linha['marca']?></span></p>
            <p><strong>Descrição: </strong> <span><?php echo $linha['descprod']?></span></p>
            <p><strong>Valor: </strong> <span><?php echo $linha['valor']?></span></p>
            <!-- <p><span>Quantidade: <button class="aumentaDiminui">+</button><input name="quantidade"/><button class="aumentaDiminui">-</button></span><button class="carrinho"><img src="../assets/aplicacao/carrinho.png"></button></p> -->
            <p><span>Quantidade: <input name="quantidade" value="<?php echo $valorQuantidade?>"/></span><button type="submit" class="carrinho"><img src="../assets/aplicacao/carrinho.png"></button></p>                                                            
        </form>
    <?php
    }
    ?>
</div>


