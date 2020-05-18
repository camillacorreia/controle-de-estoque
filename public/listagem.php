<?php require_once("../conexao/conexao.php"); ?>

<?php
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

    // Consulta ao banco de dados
    //Lembrar de dá espaço para concatenar, ou no início ou no fim
    $produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
    $produtos .= "FROM produtos ";
    $resultado = mysqli_query($conecta, $produtos);
    if(!$resultado) {
        die("Falha na consulta ao banco de dados");   
    }
?>

<!doctype html>
<html lang="pt-br">
<html>
    <head>

        <meta charset="UTF-8">
        <title>Controle de Estoque</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        
        <!-- estilo -->
        <link href="../lib/style.css" rel="stylesheet">
        
    </head>

    <body>
        <header>
            <div id="header_central">
                
                <div class="logo">
                    <img src="../lib/img/logo.png">
                </div>

                <div class="title">
                    <h1>CONTROLE <br> DE ESTOQUE</h1>
                </div>

                <div id="header_saudacao">
                    <h5>Bem vindo(a), Camilla. <a href="#"> Sair</a></h5>
                </div>

            </div>
        </header>

        <main>

            <div id="janela_pesquisa">
                <form action="listagem.php" method="get">
                    <input type="text" name="produto" placeholder="Pesquisa">
                    <input type="image"  src="../lib/img/botao_search.png">
                </form>

                <?php 
                    if (isset($mensagem)) {
                ?>
                    <p><?php echo $mensagem ?></p>
                <?php
                    }
                ?>
            </div>
            
            <div id="listagem_produtos">
                <?php
                    while($linha = mysqli_fetch_assoc($resultado)) {
                ?>
                    <ul>
                        <li class="imagem">
                            <a href="detalhe.php?codigo=<?php echo $linha['produtoID'] ?>">
                                <img src="<?php echo $linha["imagempequena"] ?>">
                            </a>
                        </li>
                        <li><h3><?php echo $linha["nomeproduto"] ?></h3></li>
                        <li>Tempo de Entrega: <?php echo $linha["tempoentrega"] ?> dias</li>
                        <li>Preço unitário: R$ <?php echo $linha["precounitario"] ?></li>
                    </ul>
                <?php
                    }
                ?>           
            </div>
            
        </main>

        </main>

        <footer>
            <div id="footer_central">
                <p>Controle de Estoque criado para a capacitação de HTML e CSS da TITAN</p>
            </div>
        </footer>
    </body>
</html>

<?php
    //Fechar conexão
    mysqli_close($conecta);
?>