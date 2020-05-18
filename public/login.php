<?php require_once("../conexao/conexao.php"); ?>
<?php
    //Adicionar variáveis de sessão
    session_start();

    if ( isset( $_POST["usuario"] )  ) {
        $usuario    = $_POST["usuario"];
        $senha      = $_POST["senha"];    
        
        $login = "SELECT * ";
        $login .= "FROM clientes ";
        $login .= "WHERE usuario = '{$usuario}' and senha = '{$senha}' ";
    
        $acesso = mysqli_query($conecta, $login);
        if ( !$acesso ) {
            die("Falha na consulta ao banco");
        }
        
        $informacao = mysqli_fetch_assoc($acesso);
        
        if ( empty($informacao) ) {
            $mensagem = "Login sem sucesso.";
        } else {
            $_SESSION["user_portal"] = $informacao["clienteID"];
            header("location:listagem.php");
        }
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
                    <?php
                        if ( isset($_SESSION["user_portal"])  ) {
                            $user = $_SESSION["user_portal"];
                            
                            $saudacao = "SELECT nomecompleto ";
                            $saudacao .= "FROM clientes ";
                            $saudacao .= "WHERE clienteID = {$user} ";
                            
                            $saudacao_login = mysqli_query($conecta,$saudacao);
                            if(!$saudacao_login) {
                                die("Falha no banco");   
                            }
                            
                            $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                            $nome = $saudacao_login["nomecompleto"];
                    
                    ?>
                        <div><h5>Bem vindo(a), <?php echo $nome ?> | <a href="sair.php">Sair</a></h5></div>
                    <?php
                        }
                    ?>
                </div>

            </div>
        </header>

        <main>

            <div id="janela_login">

                <form action="login.php" method="post">
                    
                    <h2>Tela de Login</h2>
                    <input type="text" name="usuario" placeholder="Usuário">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="submit" value="Login">
                    
                    <?php
                        if ( isset($mensagem)) { 
                    ?>
                        <p><?php echo $mensagem ?></p>
                    
                    <?php
                        }
                    ?>  
                </form>
            </div>

        </main>

        <footer>
            <div id="footer_central">
                <p>Controle de Estoque criado para a capacitação de HTML e CSS da TITAN</p>
            </div>
        </footer>
    </body>
</html>