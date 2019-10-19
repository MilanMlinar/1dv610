<?php

namespace model;

class Login {

    public function errorHandler($username, $pwd) {
        
        $error = '';

        if (empty($username))
        {
            $error = 'Username is missing';
        }
        else if (empty($pwd))
        {
            $error = 'Password is missing';
        }

        return $error;
    }
}