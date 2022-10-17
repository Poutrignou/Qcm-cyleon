<?php

session_start();

// autoload composer
require __DIR__ . '/../vendor/autoload.php';

// Call AltoRouter
$router = new AltoRouter();

// Define the sub-folder
$router->setBasePath('/Qcm-cyleon/public/');

// Map routes
//      administrative
$router->map('GET', '/', 'administrative#home', 'administrativeHome');
$router->map('GET', '/profil', 'administrative#profil', 'administrativeProfil');
//      loggin
$router->map('GET', '/connexion/[i:notification]?', 'loggin#connection', 'logginConnection');
$router->map('POST', '/connexion/traitement-connexion', 'loggin#connectionTreatment', 'logginConnectionTreatment');
$router->map('GET', '/connexion/mot-de-passe-oublie/[i:notification]?', 'loggin#forgivenPassword', 'logginForgivenPassword');
$router->map('POST', '/connexion/traitement-mot-de-passe-oublie', 'loggin#forgivenPasswordTreatment', 'logginForgivenPasswordTreatment');
$router->map('GET', '/inscription/[i:notification]?', 'loggin#inscription', 'logginInscription');
$router->map('POST', '/inscription/traitement-inscription', 'loggin#inscriptionTreatment', 'logginInscriptionTreatment');
$router->map('GET', '/modifier-mot-de-passe/[i:notification]?', 'loggin#modifyPassword', 'logginModifyPassword');
$router->map('POST', '/traitement-modification-mot-de-passe', 'loggin#modifyPasswordTreatment', 'logginModifyPasswordTreatment');
$router->map('GET', '/deconnexion', 'loggin#loginDeco', 'loginDeco');
//      appli
$router->map('GET', '/mes-produits', 'appli#display', 'appliDisplay');
$router->map('GET', '/scan', 'appli#scan', 'appliScan');
$router->map('POST', '/scan/traitement-scan', 'appli#scanTreatment', 'appliScanTreatment');
$router->map('GET', '/suppression-produit/[i:id]', 'appli#deleteProduct', 'appliDeleteProduct');
$router->map('GET', '/suppression-produit-scan/[i:id]', 'appli#deleteProductScan', 'appliDeleteProductScan');


// Match routes
$match = $router->match();

// Verify if the route exists
if(is_array($match)) {
	$controllerAction = explode('#', $match['target']);
    $controllerName = $controllerAction[0];
    $actionName = $controllerAction[1];
    $params = NULL;
    if(!empty($match['params'])) {
        $params = $match['params'];
    }
} else {
    // Run the 404 page
	$controllerName = 'administrative';
    $actionName = '404';
    $params = NULL;
}

// Call the abstracts class of controller and model
require_once('../app/Models/Model.php');
require_once('../app/Controllers/Controller.php');



$modelClassName = "Model_" . $controllerName;
$modelFileName = "../app/Models/" . $modelClassName . ".php";

$controllerClassName = "Controller_" . $controllerName;

$controllerFileName = "../app/Controllers/" . $controllerClassName . ".php";


if(file_exists($modelFileName)) {
    require_once($modelFileName);
}
if(file_exists($controllerFileName)) {
    require_once($controllerFileName);
    $controller = new $controllerClassName($router, $controllerName, $actionName, $params);
} else {
    exit("Error 404 : not found");
}