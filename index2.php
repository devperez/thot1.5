<?php
//initialiser la session
session_start();
//vérification de la connexion de l'utilisateur, si false retour au login
if($_SESSION['email'] !== ""){
    $email = $_SESSION['email'];
}else {
    header("Location:landing.php");
    exit();
}
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="./style2.css" rel="stylesheet">
        <title>MyBookShelf</title>
    </head>

    <body>

        <div class="container-fluid">
            <div class="row" id="row1">
                <div class="col-md-3 col-lg-3">
                    <img src="./logo.png" id="logo">
                </div>
                <div class="col-md-6 col-lg-6" id="search_block">
                    <form class="form_index" enctype="multipart/form-data" method="post" action="search_isbn.php">
                        <input type="text" name="isbn" placeholder="isbn" />
                        <input type="submit" value="Rechercher" /> 
                    </form>
                    <form class="form_index" action = "keyword.php" method = "get">
                        <input type = "search" name = "terme" placeholder="mots-clés">
                        <input type = "submit" name = "s" value = "Rechercher">
                    </form>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div id="block_user">
                        <h2>
                            <?php
                                include ("affichage_user.php");
                            ?>
                            <a href="deconnexion.php"><img src="./signout.png"></a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row" id="row2">
                <div class="col-md-3 col-lg-3">
                    <div id="block_nav">
                        <button onclick="showAllBooks()">Ma bibliothèque</button>
                        <button onclick="showGenres()" >Genre</button>
                        <button onclick="showAuthors()">Auteur</button>
                        <button onclick="showRecent()">Ajoutés récemment</button>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9" id="books_block">
                    <h1>Ma bibliothèque</h1>
                    <div class="content">
                        <?php 
                            include ("affichage_bibliothèque.php");
                        ?>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9" id="genres_block">
                    <h1>Genres</h1>
                    <div class="content">
                        <?php
                            include ("affichage_genres.php");
                        ?>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9" id="authors_block">
                    <h1>Auteurs</h1>
                    <div class="content">
                        <?php
                            include ("affichage_auteurs.php");
                        ?>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9" id="recent_block">
                    <h1>Ajoutés récemment</h1>
                    <div class="content">
                        <?php
                            include ("recent.php");
                        ?>
                    </div>
                </div>    
                <div class="col-md-9 col-lg-9" id="profile_block">
                    <h1>Mon compte</h1>
                    <div class="content">
                        <form class="form_modify_search" action = "modify.php" method = "post">
                            <h2> Nouvel Identifiant : </h2> <input type = "text" name = "modify_name" placeholder=""> 
                            <h2>  Nouvel email (ou actuel) : </h2> <input type = "text" name = "modify_email" placeholder=""> </br></br>
                            <input class="modify_btn" type = "submit" name = "s" value = "Modifier">
                        </form>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9" id="add_books">
                    <h1>Nouveau livre</h1>
                    <div class="content">
                        <form id="add_form" enctype="multipart/form-data" method="post" action="transfert.php">
                            <div>
                                <h3> Titre : </h3><input type="text" name="title"  />
                            </div>
                            <div>
                                <h3> Numéro ISBN : </h3><input type="text" name="isbn"  />
                            </div>
                            <div>
                                <h3>Auteur :</h3> <input type="text" name="author"  />
                            </div>
                            <div>
                                <h3> Genre : </h3><input type="text" name="genre"  />
                            </div>
                            <div id="div_couv">
                                <h3>Couverture : </h3> <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                                <input style="margin-left:8em" type="file" name="fic" size=50 />
                            </div>
                            <div>
                                <input class="modify_btn" type="submit" value="Envoyer" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9" id="del_block">
                    <div class="content">     
                        <h1>Supprimer un livre</h1>                              
                        <form class="form_modify_search" enctype="multipart/form-data" method="post" action="delbooks.php">
                            <h2>  Rentrez le numéro ISBN : </h2> <input type="text" name="isbn"  /></br></br>           
                                <input class="modify_btn" type="submit" value="Envoyer" />
                        </form>             
                    </div>                 
                </div>
            </div>
            <div class="row" id="row3">
                <div class="col-md-3 col-lg-3" id="settings_block">
                    <button id="settings_btn" onclick="toggleBlock()">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" id="icon">
                        <path fill-rule="evenodd"
                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z" />
                        </svg> Paramètres
                    </button>
                </div>
                <div class="col-md-6 col-lg-6">
                    <button class="add_btn" onclick="delBook()">Supprimer un livre</button>
                </div>
                <div class="col-md-3 col-lg-3">
                    <button class="add_btn" onclick="addBook()">Ajouter un livre</button>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <script src="main2.js"></script>
    </body>
</html>