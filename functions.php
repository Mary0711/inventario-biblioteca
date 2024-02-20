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
        header("Location: /login.php?error=statementFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s", $email);

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $pwd){
    $sql = 'INSERT INTO users (usersEmail, usersPwd) VALUES (?,?);';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: /login.php?error=statementFailed");
        exit();
    }

    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sss", $email, $pwd, $hashedPwd);

    mysqli_stmt_execute($stmt);
    header("Location: /login.php?error=none");//1
    exit();
    
}

function loginUser($conn, $email, $pwd){
    $userExist = userExist($conn, $email, $pwd);

    if($userExist === false){
        header("Location: /index.php?error=wronglogin");
        exit();
    }

    $pwdhashed = $userExist["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdhashed);

    if ($checkPwd === false) {
        header("Location: /index.php?error=wronglogin");
        exit();
    } else if($checkPwd === true){
        session_start();
        $_SESSION["usersId"] = $userExist["usersId"];
        $_SESSION["usersEmail"] = $userExist["usersEmail"]; 
        header("Location: /inventario.php");
        exit();
    }



}