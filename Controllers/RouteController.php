<?php
namespace Controllers;
use    model\Manager\RouteManager;

$notesForTomorrow = [

    4 => "Add a link to edit the page",
    5 => "Add a link to delete the page",
    6 => "Add a method to insert a new line on the page",
];
// die(var_dump($notesForTomorrow));
$router = new RouteManager($twig, $db);

// Register routes
// GENERAL ROUTES
$router->registerRoute('home', ConnectionController::class, 'index');
$router->registerRoute("logout", ConnectionController::class, "logout");
$router->registerRoute("login", ConnectionController::class, "login");
$router->registerRoute('404', ErrorController::class, 'error404');
$router->registerRoute("viewPage", PageController::class, "viewPage");

// PRIVATE ROUTES
$router->registerRoute("admin", AdminController::class, "adminControls");
$router->registerRoute("addMainTheme", MainThemeController::class, "addMainTheme");
$router->registerRoute("addSubTheme", SubThemeController::class, "addSubTheme");
$router->registerRoute("addPage", PageController::class, "addPage");
$router->registerRoute("addNewTag", SchoolTagsController::class, "addNewTag");
$router->registerRoute("buildPage", PageController::class, "buildPage");



// Handle request
$route = $_GET['route'] ?? 'home';
$router->handleRequest($route);