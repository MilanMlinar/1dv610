<?php

class Controller {
    private $layoutView;
    private $loginView;
    private $dateTimeView;
    private $registrationView;
    private $DBconnection;
    private $database;
    private $messages;
    private $sessionStorage;
    private $login;
    private $register;
    private $cookie;

    public function __construct()
    {
        $this->layoutView = new \view\LayoutView();
        $this->loginView = new \view\LoginView();
        $this->dateTimeView = new \view\DateTimeView();
        $this->registrationView = new \view\RegistrationView();
        $this->DBconnection = new \config\DBconnection();
        $this->database = new \config\Database();
        $this->messages = new \view\Messages();
        $this->sessionStorage = new \model\SessionStorage();
        $this->login = new \model\Login();
        $this->register = new \model\Register();
        $this->cookie = new \model\Cookie();
    }

    public function run()
    {
        $isLoggedIn = $this->sessionStorage->sessionExists();

        if(isset($_SESSION['SUCCESS']))
        {
            $this->loginView->setMessage($this->messages->registrationSuccess);
            $this->sessionStorage->deleteSession();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && !$this->layoutView->clickedRegistrationLink())
        {
            $isLoggedIn = false;
        }

        if ($this->layoutView->clickedRegistrationLink() && !$isLoggedIn)
        {
            if ($this->registrationView->clickedRegister())
            {
                $this->register();
            }
            return $this->layoutView->render($isLoggedIn, $this->registrationView, $this->dateTimeView);
        }


        if ($this->loginView->clickedLogin() && !$isLoggedIn)
        {
            $isLoggedIn = $this->login();
        } 
        else if ($this->loginView->clickedLogout() && $isLoggedIn)
        {
            $isLoggedIn = $this->logout();
        }
        return $this->layoutView->render($isLoggedIn, $this->loginView, $this->dateTimeView);
    }

    public function login ()
    {
        $username = $this->loginView->getUsername();
        $password = $this->loginView->getPassword();
        $keepLoggedIn = $this->loginView->getKeepLoggedIn();

        $error = $this->login->errorHandler($username, $password);

        if (!empty($error))
        {
            $this->loginView->setMessage($error);
            return false;
        }

        $userExists = $this->database->userExistsInDatabase($username, $password);
        
        if ($userExists && empty($error))
        {
            if ($keepLoggedIn)
            {
                $this->cookie->setCookies($username, $password);
            }
            $this->sessionStorage->setSession($username);
            $this->loginView->setMessage($this->messages->welcome);
            return true;
        }
        else
        {
            $this->loginView->setMessage($this->messages->wrongAuthorization);
            return false;
        }
    }

    public function logout()
    {
        $this->loginView->setMessage($this->messages->bye);
        $this->sessionStorage->deleteSession();
        $this->cookie->deleteCookies();
        return false;
    }

    public function register()
    {
        $username = $this->registrationView->getRegUsername();
        $password = $this->registrationView->getRegPassword();
        $passwordRepeat = $this->registrationView->getRegPasswordRepeat();
        
        $userAlreadyExists = $this->database->insertUserToDB($username, $password);

        $errors = $this->register->registrationInputErrors($username, $password, $passwordRepeat);

        if ($userAlreadyExists)
        {
            $errors .= $this->messages->userAlreadyExists;
        }

        if (!empty($errors))
        {
            $this->registrationView->setMessage($errors);
        }
        
        if ($userAlreadyExists && empty($errors))
        {
            $this->registrationView->setMessage($this->messages->userAlreadyExists);
        }
        else if (!$userAlreadyExists && empty($errors))
        {
            $this->loginView->setMessage($this->messages->registrationSuccess);
            $_SESSION['SUCCESS'] = true;   
            header("Location: ?");
        }
    }
}