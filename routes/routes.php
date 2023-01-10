<?php

use Core\Router;
use Controllers\WelcomeController;

$router = new Router();

$router->get("/index", [WelcomeController::class, 'index']);

$router->get("/show", [WelcomeController::class, 'show']);

$router->post("/create-user", [WelcomeController::class, 'createUser']);