<?php

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
        <link rel="stylesheet" href="../Style/indexLogged.css">
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


<!------------------------------- Corpo Lado Esquerdo (Filtro) ------------------------------->

        <section class="container">

            <div class="row">

                <div class="col-3" id = "filterTopics">

                        <div class="row">
                            <p><h5> Filtros </h5></p>
                        </div>
                        
                </div>


<!------------------------------- Fim Corpo Lado Esquerdo (Filtro) ------------------------------->

<!------------------------------------------------------------------------------------------->

<!------------------------------------- Corpo meio (Postangens) ------------------------------------->

                <div class="col-8" id = "postBody">

                    <div class="row" id= "postHeader">

                        
                        <button type="submit" class="btn btntopic" id="btn_createTopic" data-toggle="modal" data-target="#topicForm">
                            Novo tópico
                        </button>

                        <div class="modal fade" id="topicForm"><!--Quando clicarmos no botão de criar tópico o modal será aberto com o formulário de inscrição do tópico-->
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title">Criação de tópico</h5>
                                    </div>

                                    <div class="modal-body">

                                        <form method ="post" action="registerTopic.php" id="registerForm"><!--Formulário criação de tópico-->

                                            <div class="form-group">
                                                <label for="inputTitle">Título</label>
                                                <input type="text" class="form-control" name="title"><!--O name é utilizado para identificação do que é enviado quando mandamos para registrar tópico-->
                                            </div>

                                            <div class="form-group">
                                                <label for="firstText">Texto</label>
                                                <textarea class="form-control" name="firstText" rows="5"></textarea>
                                            </div>

                                            <button type="submit" class="btn btnindex" id="btnCreateTopic">Criar tópico</button>

                                        </form>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        
                        <form class="form-inline" id="topicSearch">
                            <input class="form-control" type="search" placeholder="Procurar...">
                        </form>

                    </div>

                    <div id="topics">

                    </div>

                </div>

<!----------------------------------- Fim Corpo meio (Postangens) ----------------------------------->

<!----------------------------------------------------------------------------------------------->

<!-------------------------------- Corpo lado direito (Propagandas) -------------------------------->

                <div class="col-1" id = "advertisementsBody">
                    

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