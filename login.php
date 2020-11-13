<?php
session_start();
require('connexion.php');

if(isset($_POST['email_user'])) {
    $query = "SELECT email_user, password_user FROM users WHERE email_user = '$email' and password_user='".hash('sha256', $password)."'";
    $result = mysqli_query($cnx, $query) or die(mysql_error($cnx));
    $rows = mysqli_num_rows($result);
    if($rows==1){
        echo 'c\'est bon';
        $_SESSION['email_user'] = $email;
        header("Location:index2.php");
    }else{
        $message="Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
}
