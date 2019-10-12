<?php

namespace config;

class Database {
    private $conn;

    public function __construct()
    {
    
        $this->conn = new \config\DBconnection();
    }

    public function userExistsInDatabase($username, $password) : bool
    {
        $conn = $this->conn->connect();

        $query = "SELECT username, password FROM users WHERE username = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $stmt->bind_result($DBusername, $DBPwd);
        $stmt->fetch();

        if (password_verify($password, $DBPwd) && $username == $DBusername) {
            return true;
        } else {
            return false;
        }
    }

    public function insertUserToDB($regUsername, $regPassword) : bool
    {
        $conn = $this->conn->connect();

        $username = $regUsername;
        $password = $regPassword;

        $query = "SELECT * FROM users WHERE username = ?";

        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row)
        {
            return true;
        }
        else
        {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            mysqli_query($conn, $query);
            return false;
        }
    }
    
}