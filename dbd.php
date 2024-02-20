<?php //handles the connection of the database
//procedural and object php are diferent
//se va a utilizar mysql-i (is more updated)

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "inventario_db";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connefction failed: " . mysqli_connect_error());
}