<?php

session_start();
//vérification de la connexion de l'utilisateur, si false retour au login
if($_SESSION['email'] !== ""){
    $email = $_SESSION['email'];
}else {
    header("Location:landing.php");
    exit();
}

include ('connexion.php');
// Vérifie que les informations proviennent du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbnSearch = $_POST["isbn"]; 
  
    $sql ="SELECT * FROM books, users WHERE isbn = '".$isbnSearch."' AND users.id_user = books.id_utilisateur AND users.email_user = '".$email."' ";
    $ret = mysqli_query ($cnx,$sql) or die (mysqli_error ($cnx));
        
    while($donnees = $ret->fetch_assoc()){
        
         $titre = $donnees['titre'];
         $auteur = $donnees['auteur'];
         $genre = $donnees['genre'];
         $isbn = $donnees['isbn'];
         $couverture = $donnees['img_blob'];
    }
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
                    <div class="col-md-6 col-lg-6">
                        <div id="block_couv">
                            <?php
                                if(isset($couverture)){
                                    echo '<img style="width:400px;height:500px" src="data:image/jpeg;base64,'.base64_encode($couverture).'" />'."\t";
                                }else{
                                    echo '<p style="font-size:2em">Ce livre ne fait pas partie de ta bibliothèque !</p>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6" >
                        <div id="specs">
                            <p>
                                <ul>
                                    <li> Titre :
                                        <?php
                                            if(isset($titre)){
                                                echo $titre;
                                            }
                                        ?>
                                    </li>
                                    <li> Auteur : 
                                        <?php
                                            if(isset($auteur)){
                                                echo $auteur;
                                            }
                                        ?>
                                    </li>
                                    <li> Genre : 
                                        <?php
                                            if(isset($genre)){
                                                echo $genre;
                                            }
                                        ?>
                                    </li>
                                    <li> ISBN : 
                                        <?php
                                            if(isset($isbn)){
                                                echo $isbn;
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" id="row3">
                    <div class="col-md-12 col-lg-12">
                        <a href="index2.php"><button id="ret_btn">Retour</button>
                        <form enctype="multipart/form-data" method="post" action="delbooks.php"> 
                            <input id ="hidden_input" type="text" name="isbn" value ="<?php echo $isbn;?>" />   
                            <input type="submit" value="Supprimer" id="del_btn" /> 
                        </form>
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







              