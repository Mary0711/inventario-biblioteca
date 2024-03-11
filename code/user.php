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
    public function get_allUsers()
    {
        $query = "SELECT * FROM users";

        $this->start_connection();
        $result = $this->run_query($query);

        $users = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['status'] == 1) {
                    $row['status'] = "active";
                } else {
                    $row['status'] = "inactive";
                }
                array_push($users, $row);
            }

            return $users;
        } else {
            return false;
        }
    }

    public function get_user($id)
    {
        $query = "SELECT * FROM users WHERE user_id = " . $id . "";

        $this->start_connection();
        $result = $this->run_query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
