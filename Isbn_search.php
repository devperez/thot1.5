<?php
  
  include ('connexion.php');

  // Vérifie que les informations proviennent du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $isbnSearch = $_POST["searchisbn"]; 

  //Ouvrir une nouvelle connexion au serveur MySQL
  $mysqli = new mysqli($hote, $user, $pass, $base);

  $sql ="SELECT * FROM books WHERE isbn = '".$isbnSearch."' ";
  $ret = mysqli_query ($cnx,$sql) or die (mysqli_error ($cnx));
 
  while($donnees = $ret->fetch_assoc()){
    echo '<img style="width:200px;height:250px" src="data:image/jpeg;base64,'.base64_encode( $donnees['img_blob'] ).'" />'."\t";
  }
}