<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('admin', static function ($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('signup', 'AuthController::register');
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
    $routes->get('logout', 'AuthController::logout');
});
// $routes->group('admin', ['filter' => 'isAdminLogin'], static function ($routes) {
// $routes->get('/', 'Home::index', ['filter' => 'isAdminLogin']);
// $routes->post('add_userdata', 'UserController::add_userdata', ['filter' => 'isAdminLogin']);
// $routes->get('fetchUserData', 'UserController::fetchUserData', ['filter' => 'isAdminLogin']);
// });
$routes->group('',['filter' => 'isAdminLogin'], static function ($routes) {
    // Define routes within the group
    $routes->get('/', 'Home::index'); // Route for the home page
    $routes->post('add_userdata', 'UserController::add_userdata'); // Route for adding user data
    $routes->get('fetchUserData', 'UserController::fetchUserData'); // Route for fetching user data
});
