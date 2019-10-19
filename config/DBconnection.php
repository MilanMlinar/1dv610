<?php

namespace config;

class DBconnection {
    
    private $conn;
    private $settings;

    public function __construct()
    {
        /* test */
        $this->settings = new \config\Settings();
    }

    public function connect()
    {
        $this->conn = mysqli_connect($this->settings->DB_SERVER, $this->settings->DB_USERNAME, $this->settings->DB_PASSWORD, $this->settings->DB_DB);
        return $this->conn;
    }
}