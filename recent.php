<?php
  include ("connexion.php");
  
  $req = "SELECT * FROM books, users WHERE users.id_user = books.id_utilisateur AND users.email_user = '".$email."' ORDER BY books.id_book DESC LIMIT 5";
  $ret = mysqli_query ($cnx,$req) or die (mysqli_error ($cnx));
                 
  while($donnees = $ret->fetch_assoc()) {
    echo '<img style="width:200px;height:250px" src="data:image/jpeg;base64,'.base64_encode( $donnees['img_blob'] ).'" />'."\t";
  }