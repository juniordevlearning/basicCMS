<?php

include 'router.php';
$router = new Router();
include 'routes.php';
$router->getRequest();
$router->match();

include 'connection.php';

