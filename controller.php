<?php

include ('connexion.php');

  // Vérifie que les données proviennent du formulaire
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["identifiant_user"]; 
    $email = $_POST["email_user"];
    $password = $_POST["password_user"];
    
    if (!isset($name)){
      die("S'il vous plaît entrez votre nom");
    }
    if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
      die("S'il vous plaît entrez votre adresse e-mail");
    }
    if (!isset($password)) {
        die("Merci de choisir un mot de passe");
    }
    
    //Requête d'insertion SQL
        $query = "INSERT INTO users (identifiant_user, email_user, password_user) VALUES ('$name', '$email', '".hash('sha256',$password)."')";
        $res = mysqli_query($cnx, $query);
        if($res) {
            echo "<h3>Vous êtes inscrit.</h3>";
        header("Location:sign_in.php");
        }
  }