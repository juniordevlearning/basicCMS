<?php
session_start();
$_SESSION['start'] = true;
if (isset($_SESSION['start'])) {
    echo "session set";
} else {
    echo "no session set";
}

include 'connection.php';
$con = new Connection($user, $password);
$pdo = $con->getPdo();

include 'view.php';
$view = new View($pdo);

include 'router.php';
$router = new Router($view);
include 'routes.php';
$router->getRequest();
$router->match();
