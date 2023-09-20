<?php

require_once './autoload.php';
require_once './vendor/autoload.php';


use App\Controller\UtilisateurController;
use App\Controller\RolesController;
use App\Controller\HomeController;
use App\Controller\ChocoblastController;
$rolesController = new RolesController();
$userController = new UtilisateurController();
$homeController = new HomeController();
$chocoblastController = new ChocoblastController();
session_start();
//Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test si l'url posséde une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';

//Version connectée    
if(isset($_SESSION['connected'])) {
//routeur
    switch ($path) {
        case '/mvc/':
            include './home.php';
            break;
        case '/mvc/chocoblastall':
            $chocoblastController->getAllChocoblast();
            break;
        case '/mvc/chocoblastadd':
            $chocoblastController->addChocoblast();
            break;
        case '/mvc/rolesadd':
            $rolesController->addRoles();
            break;
        case '/mvc/emailtest':
            $homeController->testMail();
            break;
                
            case '/mvc/deconnexion':
                $userController->deconnexionUser();
            break;        
        default:
            $homeController->get404();
            break;
}
} else {
    switch($path){
        case '/mvc/':
            include './home.php';
            break;
        case '/mvc/connexion':
            $userController->connexionUser();
            break;
        case '/mvc/useradd':
            $userController->addUser();
            break;
        case '/mvc/chocoblastall':
            $chocoblastController->getAllChocoblast();
            break;
        case '/mvc/emailtest':
            $homeController->testMail();
            break;
        case '/mvc/useractivate':
            $userController->mailVerify();
            break;
        default:
            $homeController->get404();
            break;
    }
}
