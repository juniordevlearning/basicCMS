<?php

$router->get('', 'home');
$router->get('/', 'home');

$router->get('edit', 'editController@index');
$router->post('edit', 'editController@store');

$router->get('admin', 'adminController@index');
$router->post('admin', 'adminController@login');