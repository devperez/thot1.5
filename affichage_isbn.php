<?php
    include ('search_isbn.php');

    while($donnees = $ret->fetch_assoc()){
        echo '<img style="width:200px;height:250px" src="data:image/jpeg;base64,'.base64_encode( $donnees['img_blob'] ).'" />'."\t";
    }