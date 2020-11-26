<?php

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
                        <img src="./logo.jpg" id="logo">
                    </div>
                    <div class="col-md-6 col-lg-6" id="search_block">
                        <h1 id="titre">Résultats</h1>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div id="block_user">
                            <h2> 
                                <?php
                                    include ("affichage_user.php");
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row" id="row2">
                    <div class="col-md-12 col-lg-12">
                        <div id="block_couv">
                            <?php    
                                include ('connexion.php');
                                // Vérifie que les informations proviennent du formulaire
                                if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher"){
                                    $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
                                    $terme = $_GET["terme"];
                                    $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
                                    $terme = strip_tags($terme); //pour supprimer les balises html dans la requête
                                    $terme = strtolower($terme);
  
                                    $sql = "SELECT img_blob FROM books, users WHERE titre LIKE '%".$terme."%' AND users.id_user = books.id_utilisateur AND users.email_user = '".$email."' ";
                                    $ret = mysqli_query ($cnx,$sql) or die (mysqli_error ($cnx));

                                    while($donnees = $ret->fetch_assoc()){
                                        $couverture = $donnees['img_blob'];
                                        echo '<img style="width:400px;height:500px" src="data:image/jpeg;base64,'.base64_encode($couverture).'" />'."\t";
                                    }
                                } else{
                                    $message = "Vous devez entrer votre requête dans la barre de recherche";
                                }
                            ?>
                        </div>
                    </div>    
                </div>
                <div class="row" id="row3">
                    <div class="col-md-12 col-lg-12">
                       <a href="index2.php"><button id="ret_btn">Retour</button>
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