<?php

namespace view;

require_once('view/View.php');

class RegistrationView extends View {

    private static $username = 'RegisterView::UserName';
    private static $password = 'RegisterView::Password';
    private static $passwordRepeat = 'RegisterView::PasswordRepeat';
    private static $messageId = 'RegisterView::Message';
    private static $register = 'RegisterView::Register';

    private $message = '';
    private $name = '';

    public function response(): string {
        return '<h2>Register new user</h2>
            <form method="post" >
                <fieldset>
                    <legend>Register a new user - Write username and password</legend>
    
                    <p id="' . self::$messageId . '">' . $this->message . '</p>
    
                    <label for="' . self::$username . '">Username :</label>
                    <input type="text" id="' . self::$username . '" name="' . self::$username . '" value="' . $this->name . '"/><br>
    
                    <label for="' . self::$password . '">Password :</label>
                    <input type="password" id="' . self::$password . '" name="' . self::$password . '" /><br>
    
                    <label for="' . self::$passwordRepeat . '">Repeat password :</label>
                    <input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" /><br>
    
                    <input type="submit" name="' . self::$register . '" value="Register" />
                </fieldset>
            </form>
        ';
    }

    public function clickedRegister()
    {
        return isset($_POST[self::$register]);
    }

    public function getRegUsername()
    {
        $this->name = $_POST[self::$username];
        return $_POST[self::$username];
    }

    public function getRegPassword()
    {
        return $_POST[self::$password];
    }

    public function getRegPasswordRepeat()
    {
        return $_POST[self::$passwordRepeat];
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
}