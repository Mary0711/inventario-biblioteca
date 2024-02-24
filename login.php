<?php
//handles the login script

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'functions.php';
    $functions = new functions();

    //error handles
    if ($functions->check_input($email, $pwd) !== false) {
        header("Location: /index.php?error=emptyinput");
        exit();
    }
    //

    $functions->login_user($email, $pwd);
} else {
    header("Location: /login.php"); //send it back to the login form
    exit();
}
