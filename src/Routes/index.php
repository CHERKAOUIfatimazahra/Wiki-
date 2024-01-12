<?php

use App\Controller\AuthController;
use App\Controller\CategoryController;
use App\Controller\UserController;
use App\Controller\HomeController;
use App\Router;
use App\Controller\WikiController;
use App\Controller\TagController;

$router = new Router();
session_start();

// Authentication
$router->get('/login', AuthController::class, 'login_url');
$router->get('/register', AuthController::class, 'register_url');
$router->post('/auth_login', AuthController::class, 'login');
$router->post('/auth_register', AuthController::class, 'register');
$router->get('/logout', AuthController::class, 'logout');

// Home page
$router->get('/', HomeController::class, 'index');

// Dashboard
if (isset($_SESSION['role']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 1)) {
    $router->get('/dashboard/wiki', WikiController::class, 'index');
    $router->get('/dashboard/tag', TagController::class, 'index');
    // $router->get('/dashboard/category', CategoryController::class, 'index');
    $router->get('/dashboard', UserController::class, 'getAllUser');
    $router->post('/add_user', UserController::class, 'add');
    $router->get('/edit_user/{id}', UserController::class,'edit');
    $router->post('/update_user/{id}', UserController::class, 'update');
    $router->get('/delete_user/{id}', UserController::class, 'destroy');

    // Category routes
    $router->get('/dashboard/category', CategoryController::class, 'index');
    $router->post('/add_category', CategoryController::class, 'add');
    $router->get('/edit_category/{id}', CategoryController::class, 'edit');
    $router->post('/update_category/{id}', CategoryController::class, 'update');
    $router->get('/delete_category/{id}', CategoryController::class, 'destroy');

    // Tag routes
    $router->post('/add_tag', TagController::class, 'add');
    $router->get('/edit_tag/{id}', TagController::class, 'edit');
    $router->post('/update_tag/{id}', TagController::class, 'update');
    $router->get('/delete_tag/{id}', TagController::class, 'destroy');

    // Wiki routes
    $router->post('/add_wiki', TagController::class, 'add');
    $router->get('/edit_wiki/{id}', TagController::class, 'edit');
    $router->post('/update_wiki/{id}', TagController::class, 'update');
    $router->get('/delete_wiki/{id}', TagController::class, 'destroy');
    
} else {
    $router->get('/login', AuthController::class, 'login_url');
}

$router->dispatch();