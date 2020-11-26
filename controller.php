<?php

include ('connexion.php');

  // Vérifie qu'il provient d'un formulaire
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
    //Ouvrir une nouvelle connexion au serveur MySQL
    $mysqli = new mysqli($hote, $user, $pass, $base);

    //Afficher toute erreur de connexion
    if ($mysqli->connect_error) {
      die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }  

    //Requête d'insertion SQL
        $query = "INSERT INTO users (identifiant_user, email_user, password_user) VALUES ('$name', '$email', '".hash('sha256',$password)."')";
        $res = mysqli_query($cnx, $query);
        if($res) {
            echo "<h3>Vous êtes inscrit.</h3>";
            $_SESSION[$email] = $email;
        header("Location:sign_in.php");
        }
  }
        
  