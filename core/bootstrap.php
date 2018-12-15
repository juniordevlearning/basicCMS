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
$view = new View;
$GLOBALS['view'] = $view;
function View()
{
    return $GLOBALS['view'];
}

include 'router.php';
$router = new Router;

include 'routes.php';
$router->getRequest();
$router->match();
