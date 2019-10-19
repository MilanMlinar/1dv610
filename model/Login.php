<?php

namespace model;

class Login {

    public function errorHandler($username, $pwd) {

        if (empty($username))
        {
            throw new \Exception('Username is missing');
        }
        else if (empty($pwd))
        {
            throw new \Exception('Password is missing');
        }
    }
}