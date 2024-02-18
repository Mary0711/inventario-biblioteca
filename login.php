<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email= $_POST["email"];
    $pwd=$_POST["pwd"];

    try {
        require_once 'dbd.php';
        require_once 'login_controller.php';
        require_once 'login_model.php';
        require_once 'login_view.php';

        //error handlers
        $errors = [];
        if(is_input_empty($name, $pwd)){
            $errors["empty_input"] = "Fill in all fields";
        }
        
        
        require_once 'config_session.php';

        if($errors){
            $_SESSION["errors_login"] = $errors;
        }



    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("Location: ../index.php");
    die();
}