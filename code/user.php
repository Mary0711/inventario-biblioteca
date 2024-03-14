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

    public function get_id()
    {
        return $this->user_id;
    }

    public function get_role()
    {
        return $this->role;
    }
}

class admin extends user
{
    public function get_allUsers($sort = "user_id", $order = "ASC")
    {
        $query = "SELECT * FROM users ORDER BY " . $sort . " " . $order . "";

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

    public function check_user($email)
    {
        $query = "SELECT * FROM users WHERE email = '" . $email . "'";
        $this->start_connection();
        $result = $this->run_query($query);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_user($user)
    {
        $query = "UPDATE users SET username = ?, email = ?, status = ?, role = ? WHERE user_id = ?";
        $this->run_stmt_query($query, "ssiss", $user['username'], $user['email'], $user['status'], $user['role'], $user['user_id']);
    }

    public function create_user($user)
    {
        if ($this->check_user($user['email'])) {
            return false;
        }

        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO users(username, email, password, status, role) VALUES (?, ?, ?, ?, ?)";
        $this->run_stmt_query($query, "sssis", $user["username"], $user['email'], $user['password'], $user['status'], $user['role']);
    }
}
