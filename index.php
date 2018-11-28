<?php
// enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
// load bootstrap
include 'config.php';
include 'core/bootstrap.php';

echo $view->render();
