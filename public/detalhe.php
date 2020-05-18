<?php require_once("../conexao/conexao.php"); ?>
<?php
    if ( isset($_GET["codigo"]) ) {
        $produto_id = $_GET["codigo"];
    }
    else {
        Header("Location: inicial.php");
    }

    //Consulta ao banco de dados
    $consulta = "SELECT * ";
    $consulta .= "FROM produtos ";
    $consulta .= "WHERE produtoID = {$produto_id} ";
    $detalhe    = mysqli_query($conecta,$consulta);

    //Testar erro
    if ( !$detalhe ) {
        die("Falha no Banco de dados");
    } else {
        $dados_detalhe = mysqli_fetch_assoc($detalhe);
        $produtoID      = $dados_detalhe["produtoID"];
        $nomeproduto    = $dados_detalhe["nomeproduto"];
        $descricao      = $dados_detalhe["descricao"];
        $codigobarra    = $dados_detalhe["codigobarra"];
        $tempoentrega   = $dados_detalhe["tempoentrega"];
        $precorevenda   = $dados_detalhe["precorevenda"];
        $precounitario  = $dados_detalhe["precounitario"];
        $estoque        = $dados_detalhe["estoque"];
        $imagemgrande   = $dados_detalhe["imagemgrande"];
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

        <div id="detalhe_produto">
                <ul>
                    <li class="imagem"><img src="<?php echo $imagemgrande ?>"></li>
                    <li><h2><?php echo $nomeproduto ?></h2></li>
                    <li><b>Descrição: </b><?php echo $descricao ?></li>
                    <li><b>Código de Barra: </b><?php echo $codigobarra ?></li>
                    <li><b>Tempo de Entrega: </b><?php echo $tempoentrega ?>dias</li>
                    <li><b>Preço Revenda: </b><?php echo "R$ " . number_format($precorevenda,2,",",".") ?></li>
                    <li><b>Preço Unitário: </b><?php echo "R$ " . number_format($precounitario,2,",",".") ?></li>
                    <li><b>Estoque: </b><?php echo $estoque ?></li>
                </ul>
               
            </div>

        </main>

        <footer>
            <div id="footer_central">
                <p>Controle de Estoque criado para a capacitação de HTML e CSS da TITAN</p>
            </div>
        </footer>
    </body>
</html>