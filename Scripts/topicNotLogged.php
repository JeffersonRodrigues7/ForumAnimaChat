<?php
    session_start();

    if(isset($_SESSION['userName'])){//Com isso eu impesso que a pagina de perfil possa ser visualizada por qualquer um, somente aqueles que validarem o acesso vão poder entrar no perfil
        header("Location: indexLogged.php");
    }

    $erro = isset($_GET['error']) ? $_GET['error'] : 0;//se vier um erro como parametro na URL então eu vou capturalo, se o erro existe traz 1 se não traz 0
    $errorUserExists = isset($_GET['errorUserExists']) ? $_GET['errorUserExists'] : 0;
    $errorEmailExists = isset($_GET['errorEmailExists']) ? $_GET['errorEmailExists'] : 0;

?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>AnimaChat</title>
 
        <script src="https://code.jquery.com/jquery-2.2.4.min.js">//preciso dele para funcionar os comandos JQUERY</script>
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="../Style/topicNotLogged.css">
        <script src="topic.js"></script>
        <script src="index.js"></script>

    </head>

    <body>

<!----------------------------------------- Navbar ----------------------------------------->

        <header>
            <nav class="navbar navbar-expand-lg navbar-light navbar-style">
                <div class="container">

                    <a class="nav-brand" href="index.php"> 
                        <img src="../imgs/_Brand.png" width="50" height="35"> AnimaChat
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavbarUl">
                            <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav ml-auto navbar-ul" id="ulNavbar" >

                            <!--Quando o usuario clicar em login vai abrir uma janelinha pra ele por seu login e senha-->
                            <li class="nav-item dropdown ">
                                <a id="Login" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Login | </a>
                                <div class="dropdown-menu <?= $erro==1 ? 'show' : '' ?>" aria-labelledby="Login"><!--Se existir um erro significa que o usuárrio digitou login errado então quadno ele for redirecionado para o index a janela de login deve aaprecer já aberta, é isso que o código em php na tag div está fazendo, vale ressaltar que como o código php está dentro de uma classse devemmos começar com < ?= -->

                                    <form method="post" action="validateAccess.php" id="formLogin">
                                        
                                        <div class="form-group">
                                            <label for="inputUserLogin">Usuário</label>
                                            <input type="text" class="form-control" id="inputUserLogin"  name="userName" placeholder="Digite seu usuário">
                                        </div>

                                        <div class="form-group">
                                            <label for="InputPasswordLogin">Senha</label>
                                            <input type="password" class="form-control" id="InputPasswordLogin" name="password" placeholder="Digite sua senha">
                                        </div>

                                        <button type="submit" class="btn btnindex" id="btn_login">Entrar</button>
                                        
                                        <?php
                                            if($erro == 1){//Caso o usuário digitado seja inválido vai mostrar essa mensagem no login
                                                echo "\n<font color='#FF0000'> Usuário ou senha inválido </font>";
                                            }
                                        ?>

                                    </form>

                                    
                                </div>
                            </li> 

                            <li class="nav-item"><a href="#"> Sobre </a> </li>
                        </ul>
                    </div>

                </div>
            </nav>
        </header>

<!--------------------------------------- FIM Navbar --------------------------------------->


<!------------------------------------------------------------------------------------------->


        <section class="container">

            <div class="row">


<!------------------------------------------------------------------------------------------->

<!------------------------------------- Corpo esquerdo/meio (Mensagens) ------------------------------------->

                <div class="col-10" id = "messageBody">

                    <div id= "messages" >

                    </div>

                </div>

<!----------------------------------- Fim Corpo esquerdo/meio (Mensagens) ----------------------------------->

<!----------------------------------------------------------------------------------------------->

<!-------------------------------- Corpo lado direito (Propagandas) -------------------------------->

                <div class="col-2" id = "advertisementsBody">
                    

                </div>

            </div>

        </section>

<!-------------------------------- Fim Corpo lado direito (Propagandas) ----------------------------->

<!------------------------------------------------------------------------------------------->

<!------------------------------------------ Rodapé -------------------------------------->

        <footer>
            <div class="container">

                <div class="row">

                    <div class="col-4">  
                            <p>Contato | Sobre | Politica de Privacidade</p>
                    </div>

                    <div class="col-4">  

                    </div>

                    <div class="col-4">  
                            <p> @2019 AnimaChat | Termos de uso</p>
                    </div>

                </div>

            </div>
        </footer>

<!------------------------------------------ FIM Rodapé -------------------------------------->

<!------------------------------------------------------------------------------------------->


<!------------------- Bibliotecas para que boostrap funcione corretamente ------------------->

        <script src="../node_modules/jquery/dist/jquery.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>

<!------------------ FIM Bibliotecas para que boostrap funcione corretamente ------------------>

<!------------------------------------------------------------------------------------------->

    </body>

</html>