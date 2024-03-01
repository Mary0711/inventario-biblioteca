<?php
session_start();
include("db.php");
class functions extends DB
{
    /**
     * Verifica cada input si estan vacios o no
     * 
     * La funcion recibe una cantidad de parametros individuales y los convierte a un array
     * Verifica cada parametro y si alguno esta vacio devuelve un cierto
     * De lo contrario devulve un falso
     * 
     * 
     * ```php
     * check_input($input1, $input2, $input3, ....)
     * ```
     * 
     * @param array $inputs
     * @return bool
     */
    public function check_input(...$inputs)
    {
        foreach ($inputs as $input) {
            if (empty($input)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Verifica si el usuario existe en la base de datos
     * 
     * Verifica si el usuario esta registrado en la base de datos y lo devuelve
     * con toda su informacion.
     * Si no existe devuelve un falso
     * 
     * @param string $email
     * @return array|false
     */
    public function check_user($email)
    {
        $sql = 'SELECT * FROM users WHERE email = ?;';
        $resultData = $this->run_stmt_query($sql, "s", $email);

        if (!$resultData) {
            header("Location: ?error=statementFailed");
            exit();
        }

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Crea un usuario nuevo en la base de datos
     * 
     * Si el usuario no existe previamente lo crea en la base de datos
     * 
     * @param string $email
     * @param string $pwd
     * @return bool
     */
    public function create_user($username, $email, $pwd, $role)
    {
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (username, email, password, role) VALUES (?,?,?,?);';
        $result = $this->run_stmt_query($sql, "ssss", $username, $email, $hashedPwd, $role);
        if (!$result) {
            return false;
        }

        return true;
    }

    /**
     * Ingresa al usuario si existe en las base de datos
     * 
     * Busca al usuario en la base de datos utilizando el email.
     * Si lo encuentra compara el password ingresado con el de la base de datos.
     * Si la informacion ingresada es correcta este es enviado al inventario.
     * De lo contrario tira un error de ingreso.
     * 
     * @param string $email
     * @param string $pwd
     * @return none
     */
    public function login_user($email, $pwd)
    {
        //Verifica si el usuario existe
        $userExist = $this->check_user($email);

        //Si no existe regresa al index
        if ($userExist === false) {
            header("Location: ../?error=user");
            exit();
        }

        /**
         * Si la contraseña es correcta lo envia al inventario
         * De lo contrario lo regresa al index
         */
        if (password_verify($pwd, $userExist['password'])) {
            $_SESSION['user'] = new user($userExist['user_id'], $userExist['username'], $userExist['email']);

            header("Location: ../pages/inventario.php");
            exit();
        } else {
            header("Location: ../?error=password");
            exit();
        }
    }
}

class user extends DB
{
    private $username;
    private $email;
    private $user_id;

    function __construct($user_id, $username, $email)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->email = $email;
    }
}
