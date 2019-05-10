<?php

    session_start();

    if(!isset($_SESSION['userName'])){//Com isso eu impesso que a pagina de perfil possa ser visualizada por qualquer um, somente aqueles que validarem o acesso vão poder entrar no perfil
        header("Location: index.php?error=1");
    }

?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>AnimaChat</title>
        
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="../Style/profile.css">
        <link rel="stylesheet" href="../Style/index.css">
    </head>

    <body>

<!----------------------------------------- Navbar ----------------------------------------->

        <nav class="navbar navbar-expand-lg navbar-light navbar-style">
            <div class="container">

                <a class="nav-brand" href="index.php"> 
                    <img src="../imgs/_Brand.png" width="50" height="35"> AnimaChat
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#NavbarUl">
                        <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto navbar-ul" id="ulNavbar" >
                        <li class="nav-item"><a href="logout.php"> Sair |</a> </li><!--Quando usuário clicar em sair ele é redirecionado para a página principal-->
                        <li class="nav-item"><a href="#"> Sobre </a> </li>
                    </ul>
                </div>

            </div>
        </nav>

<!--------------------------------------- FIM Navbar --------------------------------------->


<!------------------------------------------------------------------------------------------->


<!------------------------------- Corpo Meio (Perfil) ------------------------------->

        <div class="container">

            <div class="row">

                <div class="col-12" id = "middleBody">

                        <div class="row">

                            <div class="col-2" id = "profileImage">
                                <label for="image">Choose file to upload</label>
                                <input id="image" type="file" name="profile_photo" placeholder="Photo" required="" capture>
                                <!--require indica que o usuário deve selecionar algo antes de submeter e o capture que ele pode pegar foto pela camera-->
                            </div>

                            <div class="col-7" id = "profileDescription">
                                <label for="textDescription"><h5>Descrição</h5></label>
                                <textarea class="form-control" id="textDescription" rows="5">Conte um pouco sobre você</textarea>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-4 list" id="Topicsfavorited">
                                <h5><p>Tópicos favoritados</p></h3>
                                <div class="box"></div>
                            </div>

                            <div class="col-4 list" id="friendList">
                                <h5><p>Lista de amigos</p></h3>
                                <div class="box"></div>
                            </div>

                            <div class="col-4 list" id="Topicsparticiped">
                                <h5><p>Últimos tópicos que participou</p></h3>
                                <div class="box"></div>
                            </div>

                        </div>
  
                </div>

            </div>               

        </div>

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