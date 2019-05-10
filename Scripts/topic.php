<?php
    session_start();

    $idtopic = isset($_GET['topic']) ? $_GET['topic'] : 0;//se vier um topic como parametro na URL então eu vou capturalo, se o erro existe traz o id se não traz 0
    if($idtopic == 0) header("Location: index.php");
    $_SESSION['idtopic'] = $idtopic;

    //Se o usuário não tiver logado ele será enviado para um tópico onde ele não pode postar nada
    if(!isset($_SESSION['userName'])){//Com isso eu impesso que a pagina de perfil possa ser visualizada por qualquer um, somente aqueles que validarem o acesso vão poder entrar no perfil
        header("Location: topicNotLogged.php?topic='$idtopic'");
    }

?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>AnimaChat</title>
 
        <script src="https://code.jquery.com/jquery-2.2.4.min.js">//preciso dele para funcionar os comandos JQUERY</script>
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="../Style/topic.css">
        <script src="topic.js"></script>

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

                    <ul class="navbar-nav ml-auto navbar-ul" id="ulNavbar" >
                        <li class="nav-item"><a href="profile.php"> Perfil |</a> </li> 
                        <li class="nav-item"><a href="logout.php"> Sair |</a> </li><!--Quando usuário clicar em sair ele é redirecionado para a página principal-->
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

                    <form method ="post" action="registerMessage.php" id="messageForm"><!--Formulário criação de tópico-->

                        <div class="form-group">
                            <textarea class="form-control" name="texts" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btnindex" id="btnCreateTopic">Enviar</button>

                    </form>

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