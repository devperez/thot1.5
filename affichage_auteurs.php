<?php
  include ("connexion.php");
  
  $sql = "SELECT auteur FROM books INNER JOIN users ON users.id_user = books.id_utilisateur AND users.email_user = '".$email."' GROUP BY books.auteur ";
  
  $ret = mysqli_query ($cnx,$sql) or die (mysqli_error ($cnx));
  
  while($donnees = $ret->fetch_assoc()) {
    echo '<h2>'.$donnees['auteur'].'</h2>';
    $sql2 = "SELECT * FROM books, users WHERE users.id_user = books.id_utilisateur AND users.email_user = '".$email."' AND books.auteur = '".$donnees['auteur']."' ";
    $ret2 = mysqli_query ($cnx,$sql2) or die (mysqli_error ($cnx));
    while($donnees = $ret2->fetch_assoc()) {
      echo '<img style="width:200px;height:250px" src="data:image/jpeg;base64,'.base64_encode( $donnees['img_blob'] ).'" />'."\t";
    }
  }