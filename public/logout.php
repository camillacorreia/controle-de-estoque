<?php require_once("../conexao/conexao.php"); ?>

<?php
    //Iniciar a sessão
    session_start();
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
                    <div><h5>Bem vindo(a), Camilla. <a href="#"> Sair</a></h5></div>
                </div>
                <?php
                    }
                ?>

            </div>
        </header>

        <main>

            <?php
                //Exclue a variavel de sessao mencionada.
                unset($_SESSION["usuario"]);

                //Destrói todas as variáveis de sessão da aplicação.
                session_destroy(); 
            ?>
            
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