<?php
    session_start();
    require('connexion.php');

    //On récupère les variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($email)) {
        $query = "SELECT email_user, password_user FROM users WHERE email_user = '$email' AND password_user='".hash('sha256', $password)."'";
        $result = mysqli_query($cnx, $query) or die(mysqli_error($cnx));
        $rows = mysqli_num_rows($result);
            if($rows==1){
                $_SESSION['email'] = $email;
                header("Location:index2.php");
            }else{
                echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
    }
