<?php

    session_start();

    //vérification de la connexion de l'utilisateur, si false retour au login
if($_SESSION['email'] !== ""){
    $email = $_SESSION['email'];
   // echo  $_SESSION['email'];
}else {
    header("Location:landing.php");
    exit();
}

include ('connexion.php');

// Vérifie que les informations proviennent du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modify_name = $_POST["modify_name"]; 
    $modify_email = $_POST["modify_email"]; 

    $sql = " UPDATE `users` SET `identifiant_user` = '".$modify_name."', `email_user` = '".$modify_email."' WHERE  users.email_user = '".$email."' ";
    $ret = mysqli_query ($cnx,$sql) or die (mysqli_error ($cnx));

    echo 'Données mises à jour avec succés !';
    header('Refresh:2; URL=landing.php');
}

