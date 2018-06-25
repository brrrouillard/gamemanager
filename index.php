<?php

session_start();
if (!isset($_SESSION['pseudo'])){ // Si l'utilisateur n'est pas connecté on l'appelle invité
    $_SESSION['pseudo'] = 'invité';
}

define('VIEW_PATH', 'views/');
define('CONTROLLER_PATH', 'controllers/');

$timeStart = microtime(true);

function chargerClasse($classe) {
    require_once 'models/' . $classe . '.class.php';
}

spl_autoload_register('chargerClasse'); 

require_once(VIEW_PATH . 'header.php');

$db = Db::getInstance();

if (!isset($_GET['action'])){
    $_GET['action'] = 'index'; // On définit une action "bidon" s'il n'y en a pas
}

$action = $_GET['action'];
switch($action){
    case 'contact':
        require_once(CONTROLLER_PATH . 'ContactController.php');
        $controller = new ContactController();
        break;
    case 'jeux':
        require_once(CONTROLLER_PATH . 'JeuxController.php');
        $controller = new JeuxController($db);
        break;
    case 'register':
        require_once(CONTROLLER_PATH . 'RegisterController.php');
        $controller = new RegisterController($db);
        break;
    case 'chat':
        require_once(CONTROLLER_PATH . 'ChatController.php');
        $controller = new ChatController($db);
        break;
    case 'login':
        require_once(CONTROLLER_PATH . 'LoginController.php');
        $controller = new LoginController($db);
        break;
    case 'bd':
        require_once(CONTROLLER_PATH . 'BdController.php');
        $controller = new BdController($db);
        break;
    default:
        require_once(CONTROLLER_PATH . 'AccueilController.php');        
        $controller = new AccueilController();
        break;

}

$controller->run();
$timeEnd = microtime(true);
$timeExec = round(($timeEnd - $timeStart)*1000,3);

require_once(VIEW_PATH . 'footer.php');

