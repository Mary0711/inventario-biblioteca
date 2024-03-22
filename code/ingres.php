<?php
include "functions.php";

$functions = new functions();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_GET['register'])) {
        $username;
        $email;
        $pwd;

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pwd'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
        }


        if ($functions->check_input($username, $email, $pwd)) {
            header("Location: ../?register&error=input");
            exit();
        }

        if ($functions->check_user($email) !== false) {
            header("Location: ../?register&error=user");
            exit();
        }

        if ($functions->create_user($username, $email, $pwd, "user")) {
            $functions->login_user($email, $pwd);
            exit();
        } else {
            header("Location: ../?register&error=create");
            exit();
        }
    } else if (isset($_GET['login'])) {
        $email;
        $pwd;

        if (isset($_POST['email']) && isset($_POST['pwd'])) {
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
        }

        if ($functions->check_input($email, $pwd) !== false) {
            header("Location: ../?error=input");
            exit();
        }

        $functions->login_user($email, $pwd);
    }
} else if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}

header("Location: ../?wrong_enter");