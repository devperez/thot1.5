<?php 
  include ("connexion.php");

  $sql = "SELECT * FROM books, users WHERE users.id_user = books.id_utilisateur AND users.email_user = '".$email."'";

  $ret = mysqli_query ($cnx,$sql) or die (mysqli_error ($cnx));

  while($donnees = $ret->fetch_assoc()){
    echo '<img style="width:200px;height:250px" src="data:image/jpeg;base64,'.base64_encode( $donnees['img_blob'] ).'" />'."\t";
  }