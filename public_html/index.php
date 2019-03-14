<?php

session_start();

define('ENVIRONMENT', 'development');

switch (ENVIRONMENT) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
    break;
    case 'testing':
    case 'production':
        ini_set('display_erros', 0);
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
    break;
}

include_once "../src/autoload.php";

if (!isset($_GET['url'])) {
    $controller = new src\controllers\IndexController();
    return FALSE;
}

$url = isset($_GET['url']) ? $_GET['url'] : NULL;
$url = rtrim($url, '/');
$url = explode('/', $url);

if (src\router\Router::validRoute($url[0])) {
    $controllerName = ucfirst($url[0]) . 'Controller';
    $controllerPath = '../src/controllers/' . $controllerName . '.php';

    if (file_exists($controllerPath)) {
        require $controllerPath;
    } else {
        return FALSE;
    }
    $controllerNamespace = 'src\controllers\\';
    $controllerClass = $controllerNamespace . $controllerName;
    $controller = new $controllerClass;
}

?>