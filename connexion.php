<?php


    $hote = 'localhost';
    $base = 'mybookshelf';
    $user = 'root';
    $pass = 'anathema';
    $cnx = mysqli_connect($hote, $user, $pass) or die(mysqli_error($cnx));
    $ret = mysqli_select_db($cnx,$base) or die(mysqli_error($cnx));
    
