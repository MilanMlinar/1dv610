<?php

namespace model;

class Register {

    public function registrationInputErrors($username, $pwd, $pwdConfirm) {

        $string = '';

        if($username != strip_tags($username))
        {
            $string = "Username contains invalid characters.";
            return $string;
        }

        if(empty($username) || strlen($username) < 3) {
            $string .= "Username has too few characters, at least 3 characters.<br>";
        }

        if(empty($pwd)) {
            $string .= "Password has too few characters, at least 6 characters.<br>";
        }

        if(!empty($pwd) && strlen($pwd) < 6) {
            $string .= "Password has too few characters, at least 6 characters.<br>";
        }

        if(!empty($pwd) && !empty($pwdConfirm) && $pwd != $pwdConfirm)
        {
            $string .= "Passwords do not match. ";
        }

        return $string;
    }
}