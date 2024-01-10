<?php

use App\Controller\UserController;
use App\Controller\HomeController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/user', HomeController::class, 'user');
$router->post('/add', UserController::class, 'add');


$router->dispatch();
