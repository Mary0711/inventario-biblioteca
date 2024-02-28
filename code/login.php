<?php
//handles the login script

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'functions.php';
    $functions = new functions();

    //error handles
    if ($functions->check_input($email, $pwd) !== false) {
        header("Location: ../?error=emptyinput");
        exit();
    }
    //

    $functions->login_user($email, $pwd);
} else {
    header("Location: /?login"); //send it back to the login form
    exit();
}
