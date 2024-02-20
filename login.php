<?php
//handles the login script

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];


    require_once 'dbd.php';
    require_once 'functions.php';

    //error handles
    if(emptyInputLogin($email, $pwd) !== false){
        header("Location: /index.php?error=emptyinput");
        exit();
    }
    //

    loginUser($conn, $email, $pwd);
}else {
    header("Location: /login.php"); //send it back to the login form
    exit();
}