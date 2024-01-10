<?php

use MVC\Controller\UserController;
use MVC\Controller\HomeController;
use MVC\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/user', HomeController::class, 'user');
$router->post('/controller/add', UserController::class, 'add');

$router->dispatch();