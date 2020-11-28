<?php
  include ('connexion.php');

  session_start();

//vérification de la connexion de l'utilisateur, si false retour au login
if($_SESSION['email'] !== ""){
    $email = $_SESSION['email'];

// Vérifie que les informations proviennent du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"]; 
  $isbn = $_POST["isbn"];
  $genre = $_POST["genre"]; 
  $author = $_POST["author"];

  //Ouvrir une nouvelle connexion au serveur MySQL
  $mysqli = new mysqli($hote, $user, $pass, $base);

  //Afficher toute erreur de connexion
  if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
  }else {
 
  }


  $ret        = false;
  $img_blob   = '';
  $img_taille = 0;
  $img_type   = '';
  $img_nom    = '';
  $taille_max = 250000;
  $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);
  
  if (!$ret) {
      echo "Problème de transfert.";
      header('Refresh:2; URL=index2.php');
  } else {
      // Le fichier a bien été reçu
      $img_taille = $_FILES['fic']['size'];
      
      if ($img_taille > $taille_max) {
          echo "Fichier image trop volumineux !";
          header('Refresh:2; URL=index2.php');
      }

      $img_type = $_FILES['fic']['type'];
      $img_nom  = $_FILES['fic']['name'];
      $img_blob = file_get_contents ($_FILES['fic']['tmp_name']);


      $query2 ="SELECT id_user FROM users WHERE email_user = '".$email."' ";
      $res = mysqli_query($cnx, $query2);

      while ($row = $res->fetch_assoc()) {
        $id = $row['id_user'];
      }
      
      $query = "INSERT INTO books (id_utilisateur, isbn, titre, img_blob, genre, auteur) VALUES ('".$id."','".$isbn."', '".$title."','" . addslashes ($img_blob) . "','".$genre."','".$author."')";
      $res = mysqli_query($cnx, $query);
      if($res) {
        echo "<h3>Livre enregistré.</h3>";
        header('Refresh:2; URL=index2.php');
      }
    
  }
}


} else {
    header("Location:landing.php");
    exit();
}