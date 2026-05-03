<?php
namespace Controllers;
use    model\Manager\RouteManager;


$router = new RouteManager($twig, $db);

// Register routes
// GENERAL ROUTES
$router->registerRoute('home', ConnectionController::class, 'index');
$router->registerRoute("logout", ConnectionController::class, "logout");
$router->registerRoute("login", ConnectionController::class, "login");
$router->registerRoute('404', ErrorController::class, 'error404');

// PRIVATE ROUTES
$router->registerRoute("admin", AdminController::class, "adminControls");




// Handle request
$route = $_GET['route'] ?? 'home';
$router->handleRequest($route);