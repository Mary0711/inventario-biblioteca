<?php
include("db.php");

class user extends DB
{
    private $username;
    private $email;
    private $user_id;
    private $role;

    function __construct($user_id, $username, $email, $role)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function get_role()
    {
        return $this->role;
    }
}

class admin extends user
{
}
