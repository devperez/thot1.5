<?php
    
    if ( isset($_GET['id']) ){
        $id = intval ($_GET['id']);
        include ("connexion.php");
        $req = "SELECT img_id, img_type, img_blob " . 
               "FROM couvertures WHERE img_id = " . $id;
        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
        $col = mysqli_fetch_row ($ret);
        
        if ( !$col[0] ){
            echo "Id d'image inconnu";
        } else {
            header ("Content-type: " . $col[1]);
            echo $col[2];
        }

    } else {
        echo "Mauvais id d'image";
    }

?>