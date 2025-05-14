<link rel="stylesheet" href="../style.css">
<header>
    <h3>Listar Produtos</h3>
</header>
<ul class="menu">
    <li><a target="_self" href="../index.php">Home</a></li>
    <li><a target="_self" href='apresentaProdutos.php'>Voltar </a><br></li>
</ul>
<div class="mostraProdutos">
    <?php
    session_start();

    if((!isset($_SESSION['login'])) && (!isset($_SESSION['usuarioLogado']))){
        header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
    }

    include "../conecta.php";

    $resultado = $pdo->query("select * from produto order by codproduto");

    while($linha = $resultado->fetch( PDO::FETCH_ASSOC )) {
    ?>
        <section>
            <form action="edicao_produto.php" method="post">
                <p><img width="100px" height="100px" src="../assets/produto/<?php echo $linha['imagem']?>">
                    <!-- <br><input type="hidden" name ="MAX_FILE_SIZE" value="500000000"/>
                    <input type="file" name="fotoPerfil"/>
                    <input type="hidden" name="imagemAtual" value="<?php // echo $usuario['imagem']?>"/> -->
                </p>
                <p>ID: <?php echo $linha['codproduto']; ?></p>
                <input type ="hidden" name = "codproduto" value="<?php echo $linha['codproduto']?>">
                <p>Nome do Produto:  <input type="text" name="nomeprod" value="<?php echo $linha['nomeprod']?>"></p>
                <p>Marca do Produto:  <input type="text" name="marca" value="<?php echo $linha['marca']?>"></p>
                <p>Categoria do Produto:  <input type="text" name="categoria" value="<?php echo $linha['categoria']?>"></p>
                <p>Descrição do Produto:<input type ="text" name = "descprod" value="<?php echo $linha['descprod']?>"></p> 
                <p>Valor do Produto:  <input type="text" name="valor" value="<?php echo $linha['valor']?>"></p>
                <div>
                    <button type="submit" name="acao" value="editar"> Editar </button>
                    <button type="submit" name="acao" value="excluir" onclick = "return confirma_excluir()"> Deletar </button> 
                </div>
            </form>                                                         
        </section>
    <?php
    }
    ?>
</div>