<?php
    include ("connexion.php");

    $sql = "SELECT identifiant_user FROM users WHERE email_user = '".$email."' ";

    $ret = mysqli_query ($cnx,$sql) or die (mysqli_error ($cnx));

    while($donnees = $ret->fetch_assoc()){
        echo $donnees['identifiant_user'];
    }