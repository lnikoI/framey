<?php

use Controllers\WelcomeController;
use Core\Router;

$router = new Router();

$router->get("/", [WelcomeController::class, 'home']);

$router->get("/index", [WelcomeController::class, 'index']);

$router->get("/show", [WelcomeController::class, 'show']);

$router->post("/create-user", [WelcomeController::class, 'createUser']);