<?php

function emptyInputLogin($email, $pwd){
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function userExist($conn, $email, $pwd){
    $sql = 'SELECT * FROM users WHERE usersEmail = ?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../login.php?error=statementFailed");
        exit();
    }

    //terminar funcion del video de sign up
}


function loginUser($conn, $email, $pwd){
    $userExist = userExist($conn, $email, $pwd);

    if($userExist === false){
        header("Location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdhashed = $userExist["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdhashed);

    if ($checkPwd === false) {
        header("Location: ../index.php?error=wronglogin");
        exit();
    } else if($checkPwd === true){
        session_start();
        $_SESSION["usersId"] = $userExist["usersId"];
        $_SESSION["usersEmail"] = $userExist["usersEmail"]; 
        header("Location: ../index.php");
        exit();
    }



}