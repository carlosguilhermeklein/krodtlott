<?php
include('connection.php');
include('consultas.php');

$id_li = $_GET['id_li'];

?>
<?php include('head.php'); ?>

<body>
    <?php include('header.php'); ?>
    <section class="search">
        <input placeholder="Pesquisar" type="search" class="searchbar">
    </section>
    <section id="menu" class="menu_show">
        <div class="menu_section">
            <div class="menu_perfil">
                <img src="./images/icons/Icon.svg" alt="">
            </div>
            <div class="menu_content">
                <h1>Bem vindo</h1>
                <p>Entre na sua conta para fazer as compras e ver seu carrinho</p>
                <a href="./login.php"><input type="button" value="Entrar" class="menu_login"></a>
                <a href="./signup.php"><input type="button" value="Crie sua conta" class="menu_signup">
            </div></a>
        </div>
        <div class="menu_options">
            <a href="./sobrenos.php">Sobre nós</a>
            <a href="./contact.php">Contato</a>
            <p>SIGA-NOS NAS REDES SOCIAIS</p>
        </div>
        <div class="menu_icons">
            <a href="https://www.instagram.com/agilizatec/"><img src="./images/icons/Insta rodapé.svg" alt=""></a>
            <a href="https://www.facebook.com/agilizatec"><img src="./images/icons/Whats rodapé.svg" alt=""></a>
        </div>
    </section>
    <main>
        <div id="overlay"></div> <!-- DIV PARA OVERLAY AO ABRIR MENU DROPDOWN-->
        <section class="site">
            <div class="title">
                <h1>Conheça nossos produtos:</h1>
            </div>
            <ul class="list_product">
                <?php
                $num_produtos = num_produtos_categoria($mysqli, $id_li);
                if ($num_produtos) {
                    $query_produtos = "SELECT * FROM produtos WHERE id_categoria = '$id_li';";
                    $resultado_query = mysqli_query($mysqli, $query_produtos);
                    while ($row_produtos = mysqli_fetch_assoc($resultado_query)) {
                        ?>
                        <li class="product">
                        <img src="<?php echo $row_produtos['imagem_produto']?>" class=" img_product">
                        <h1>
                        <?php echo $row_produtos['nome_produto']?>
                        </h1>
                        <a href="descriptions.php?id_li= <?php echo $row_produtos['id']?>"><input
                                type="button" value="Ver Mais" class="seemore"></a>
                    </li><?php
                    }
                    ?>
                    
                    <?php

                } else {
                    ?>
                    <h1 class="falta_estoque">Por enquanto não temos esse produto no Estoque :( </h1> 
                    <?php
                }
                ?>


            </ul>

        </section>
    </main>
    <?php include('footer.php') ?>
</body>
