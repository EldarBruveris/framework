<?php

use App\Controllers\FindAction;
use App\Controllers\FindResultAction;
use App\Controllers\HomeAction;
use App\Controllers\FormAction;
use App\Controllers\ResultAction;
use App\Controllers\ShowAction;
use app\Controllers\UserAction;
use App\Controllers\UserDetailsAction;
use App\Controllers\UserEditAction;
use app\Infrastructure\Router\Router;

$router = new Router();

$router->addRoute('GET', '/users', new UserAction());
$router->addRoute('GET', '/', new HomeAction());
$router->addRoute('GET', '/users/new', new FormAction());
$router->addRoute('POST', '/users', new ResultAction());
$router->addRoute('GET', '/show', new ShowAction());
$router->addRoute('GET', '/users/edit/:userID', new UserEditAction());
$router->addRoute('GET', '/users/:userID', new UserDetailsAction());
$router->addRoute('GET', '/find', new FindAction());
$router->addRoute('POST', '/findResult', new FindResultAction());



$router->matchRoute();
