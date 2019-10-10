<?php
session_start();

//INCLUDE THE FILES NEEDED...
require_once('config/DBconnection.php');
require_once('config/Database.php');
require_once('config/Settings.php');

require_once('model/Login.php');
require_once('model/Register.php');
require_once('model/SessionStorage.php');
require_once('model/Cookie.php');

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegistrationView.php');
require_once('view/Messages.php');

require_once('controller/Controller.php');


//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS

$c = new Controller();
$c->run();
