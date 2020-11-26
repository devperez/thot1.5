<?php
//initialiser la session
session_start();
//vérification de la connexion de l'utilisateur, si false retour au login
if($_SESSION['email'] !== ""){
    $email = $_SESSION['email'];
   // echo  $_SESSION['email'];
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
            <title>MyBookShelf</title>
        </head>
        <body>
            <h1>Résulat</h1>
            <?php
                include ("search_isbn.php");
            
                while($donnees = $ret->fetch_assoc()){
                    echo '  <img style="width:400px;height:500px" src="data:image/jpeg;base64,'.base64_encode( $donnees['img_blob'] ).'" />'."\t";
                    echo "  '".$donnees['titre']."' ";
                    echo "  '".$donnees['auteur']."' ";
                    echo "  '".$donnees['genre']."' ";
                }
            ?>
        </body>
    </html>