<?php //handles the connection of the database
//procedural and object php are diferent
//se va a utilizar mysql-i (is more updated)

if (!$conn) {
    die("Connefction failed: " . mysqli_connect_error());
}

class DB
{
    private $servername = "localhost";
    private $username = "root";
    private $pass = "";
    private $dbname = "inventario";
    private $conn;

    public function start_connection()
    {
        try {
            $this->conn = mysqli_connect($this->servername, $this->username, $this->pass, $this->dbname, "3305");
        } catch (Exception $e) {
            $this->conn = mysqli_connect($this->servername, $this->username, $this->pass, $this->dbname, "3306");
        }
    }

    public function run_stmt_query($query, $types,  ...$params)
    {
        $this->start_connection();
        $stm = mysqli_stmt_init($this->conn);

        if (!mysqli_stmt_prepare($stm, $query)) {
            return false;
        }

        mysqli_stmt_bind_param($stm, $types, ...$params);
        mysqli_stmt_execute($stm);
        return mysqli_stmt_get_result($stm);
    }
}
