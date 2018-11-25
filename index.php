<?php

if ($_SERVER['REDIRECT_URL']) {
    // trims / and . of the string
    $request = trim($_SERVER['REDIRECT_URL'], '/, .');
    // if filename has an extension cut it off because we are looking for .php as default
    if (pathinfo($request, PATHINFO_EXTENSION)) {
        $request = substr($request, 0, strrpos($request, '.'));
    } 
}

include 'router.php';
$router = new Router($request);
include 'routes.php';

include 'app/connection.php';
include 'config.php';
include 'app/layout.php';
