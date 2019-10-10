<?php

namespace model;

class Cookie {
    private static $COOKIE_USERNAME = 'LoginView::CookieName';
    private static $COOKIE_PASSWORD = 'LoginView::CookiePassword';
    private static $cookieLifeSpan = 9999;

    public function setCookies($username, $password) : void
    {
        $username = $username;
        $password = base64_encode($password);

        setcookie(self::$COOKIE_USERNAME, $username, time() + self::$cookieLifeSpan);
        setcookie(self::$COOKIE_PASSWORD, $password, time() + self::$cookieLifeSpan);
    }

    public function deleteCookies() : void
    {
        setcookie(self::$COOKIE_USERNAME, '', time() - self::$cookieLifeSpan);
        setcookie(self::$COOKIE_PASSWORD, '', time() - self::$cookieLifeSpan);
    }
}