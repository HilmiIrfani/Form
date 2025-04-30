<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->post('/login', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index');







