<?php

namespace model;

class SessionStorage {
    private static $SESSION_KEY =  __CLASS__ .  "::UserName";

    public function setSession(string $username) {
		$_SESSION[self::$SESSION_KEY] = md5($username);
    }
    
    public function sessionExists() : bool
	{
        if (isset($_SESSION[self::$SESSION_KEY])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteSession()
    {
        unset($_SESSION[self::$SESSION_KEY]);
        unset($_SESSION['SUCCESS']);
    }
}