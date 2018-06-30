<?php
session_start();

define('APPLICATION_PATH', getcwd() . '/../app/');
define('PUBLIC_PATH', getcwd());

require '../vendor/autoload.php';
require_once "../app/config.php";

//function pre($smth)
//{
//    echo "<pre>";
//    print_r($smth);
//    echo "</pre>";
//}

$routes = explode('/', $_SERVER['REQUEST_URI']);

$controller_name = "Users";
$action_name = "authorize";
if (!empty($routes[1])) {
    $controller_name = $routes[1];
}
if (!empty($routes[2])) {
    $action_name = $routes[2];
}

$fileName = "../app/controllers/" . $controller_name . ".php";
try {
    if (file_exists($fileName)) {
        require_once $fileName;
    } else {
        throw new Exception('File not found: ' . $fileName);
    }

    $className = "\\App\\Controllers\\" . ucfirst($controller_name);

    if (class_exists($className)) {
        $controller = new $className();
    } else {
        throw new Exception('File found but class not found: ' . $className);
    }

    if (method_exists($controller, $action_name)) {
        $controller->$action_name();
    } else {
        throw new Exception("Class exists but action not found: " . $action_name);
    }
} catch (Exception $e) {
    require "errors/404.php";
}
