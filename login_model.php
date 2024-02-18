<?php

declare(strict_types=1);//the variable have to be a certain data type


//Spdo is the connection
function get_user(object $pdo, string $email){
    $query = "SELECT * FROM users HWERE username = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}