<?php

include 'router.php';
$router = new Router();
include 'routes.php';
$router->getRequest();
$router->match();

include 'app/connection.php';
include 'config.php';
