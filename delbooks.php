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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbnSearch = $_POST["isbn"]; 
    

   $sql1 = "SELECT id_book from books, users WHERE isbn = '".$isbnSearch."' AND users.id_user = books.id_utilisateur AND users.email_user = '".$email."' ";


    $ret = mysqli_query ($cnx,$sql1) or die (mysqli_error ($cnx));
    while($donnees = $ret->fetch_assoc()){
        $id_book = $donnees['id_book'];
    }

    $sql ="DELETE FROM books  WHERE isbn = '".$isbnSearch."' AND id_book = '".$id_book."'  ";
    $ret = mysqli_query ($cnx,$sql) or die (mysqli_error ($cnx));
    echo '<h3>livre supprimé.</h3>';
    header('Refresh:2;url=index2.php');
}
