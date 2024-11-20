<?php

use app\Controllers\UserAction;
use App\Controllers\UserDetailsAction;
use Router\Router;

include_once "../Router/Router.php";


spl_autoload_register(static function ($class) {
    $path = str_replace('\\', '/', $class) . '.php';

    require_once __DIR__ . '/../' . lcfirst($path);
});


$router = new Router();

$router->addRoute('GET', '/users', new UserAction());
$router->addRoute('GET', '/users/:userID', new UserDetailsAction());

$router->matchRoute();
