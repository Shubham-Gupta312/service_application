<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('register', 'AuthController::register');
$routes->post('signup', 'AuthController::register');
$routes->get('login', 'AuthController::login');

$routes->get('/', 'Home::index');